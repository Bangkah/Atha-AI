# api/main.py  – Google Gemini gratis
import os, httpx, uvicorn
from fastapi import FastAPI, HTTPException
from fastapi.middleware.cors import CORSMiddleware
from pydantic import BaseModel
from dotenv import load_dotenv

load_dotenv()
app = FastAPI()
app.add_middleware(CORSMiddleware, allow_origins=["*"], allow_credentials=True, allow_methods=["*"], allow_headers=["*"])

GEMINI_KEY = os.getenv("GEMINI_API_KEY", "AIzaSyA_4IYIcgPih_o5MvusjOhQXZS0LZVUJ5E")
class Ask(BaseModel):
    message: str

@app.post("/ask")
async def ask_gemini(body: Ask):
    url = f"https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key={GEMINI_KEY}"
    payload = {"contents": [{"parts": [{"text": body.message}]}]}
    async with httpx.AsyncClient() as client:
        r = await client.post(url, json=payload, timeout=30)
    data = r.json()
    if "candidates" not in data:
        raise HTTPException(status_code=500, detail=data)
    return {"answer": data["candidates"][0]["content"]["parts"][0]["text"]}

if __name__ == "__main__":
    uvicorn.run(app, host="0.0.0.0", port=8000)