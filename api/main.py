# api/main.py – Google Gemini gratis
import os
import httpx
import uvicorn
from fastapi import FastAPI, HTTPException
from fastapi.middleware.cors import CORSMiddleware
from pydantic import BaseModel
from dotenv import load_dotenv

# Load variabel dari .env
load_dotenv()

app = FastAPI(
    title="Atha AI Backend",
    description="API FastAPI untuk koneksi ke Google Gemini",
    version="1.0.0"
)

# CORS bebas akses
app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"]
)

# API Key Gemini (ambil dari .env jika ada)
GEMINI_KEY = os.getenv("GEMINI_API_KEY")
if not GEMINI_KEY:
    raise RuntimeError("GEMINI_API_KEY belum diatur di .env")

class Ask(BaseModel):
    message: str

@app.post("/ask")
async def ask_gemini(body: Ask):
    """
    Endpoint untuk mengirim pertanyaan ke Google Gemini dan menerima jawabannya.
    """
    url = f"https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key={GEMINI_KEY}"
    payload = {"contents": [{"parts": [{"text": body.message}]}]}

    try:
        async with httpx.AsyncClient(timeout=30) as client:
            r = await client.post(url, json=payload)
            r.raise_for_status()
            data = r.json()
    except httpx.RequestError as e:
        raise HTTPException(status_code=500, detail=f"Request error: {str(e)}")
    except httpx.HTTPStatusError as e:
        raise HTTPException(status_code=e.response.status_code, detail=f"HTTP error: {str(e)}")

    # Validasi respons Gemini
    if "candidates" not in data or not data["candidates"]:
        raise HTTPException(status_code=500, detail="Respons dari Gemini tidak valid")

    try:
        answer = data["candidates"][0]["content"]["parts"][0]["text"]
    except (KeyError, IndexError):
        raise HTTPException(status_code=500, detail="Format respons dari Gemini tidak sesuai")

    return {"answer": answer}

# Jalankan API jika file ini dieksekusi langsung
if __name__ == "__main__":
    uvicorn.run("main:app", host="0.0.0.0", port=int(os.getenv("PORT", 8000)), reload=True)
