const chat   = document.getElementById("chat");
const form   = document.getElementById("chatForm");
const input  = document.getElementById("msgInput");
const API    = "https://atha-ai-production.up.railway.app/ask"; // <- ubah ini

function appendMsg(role, text) {
  const div = document.createElement("div");
  div.className = `p-2 rounded-lg max-w-xs lg:max-w-md ${
    role === "user"
      ? "bg-sky-600 self-end ml-auto"
      : "bg-slate-700 self-start mr-auto"
  }`;
  div.innerText = text;
  chat.appendChild(div);
  chat.scrollTop = chat.scrollHeight;
}

form.addEventListener("submit", async (e) => {
  e.preventDefault();
  const msg = input.value.trim();
  if (!msg) return;
  appendMsg("user", msg);
  input.value = "";

  try {
    const res = await fetch(API, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ message: msg }),
    });
    const data = await res.json();
    appendMsg("bot", data.answer);
  } catch (err) {
    appendMsg("bot", "❌ Gagal memuat jawaban.");
  }
});
