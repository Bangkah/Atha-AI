<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Atha AI</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Scrollbar custom */
    #chat::-webkit-scrollbar {
      width: 8px;
    }
    #chat::-webkit-scrollbar-track {
      background: transparent;
    }
    #chat::-webkit-scrollbar-thumb {
      background: rgba(56, 189, 248, 0.5);
      border-radius: 4px;
    }
    /* Animasi bubble */
    .bubble {
      animation: fadeInUp 0.3s ease-in-out;
    }
    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 text-white flex items-center justify-center min-h-screen">

  <div class="w-full max-w-2xl p-6 rounded-3xl shadow-2xl backdrop-blur-lg bg-white/5 border border-white/10">
    
    <!-- Header -->
    <div class="text-center mb-6">
      <h1 class="text-4xl font-extrabold bg-gradient-to-r from-sky-400 via-blue-500 to-indigo-500 bg-clip-text text-transparent drop-shadow-lg">
        Atha AI
      </h1>
      <p class="text-slate-400 text-sm mt-1 italic">Chatbot AI Profesional • Cepat & Responsif</p>
    </div>

    <!-- Chat Area -->
    <div id="chat" class="space-y-4 h-96 overflow-y-auto p-4 border border-slate-700 rounded-2xl bg-slate-900/60 shadow-inner">
      <!-- Contoh Pesan AI -->
      <div class="flex items-start gap-3 bubble">
        <img src="https://i.ibb.co/9H7qZyY/ai-icon.png" alt="AI" class="w-8 h-8 rounded-full">
        <div class="bg-slate-700 px-4 py-2 rounded-2xl max-w-[80%] shadow">
          Halo! Saya Atha AI, siap membantu Anda.
        </div>
      </div>
      <!-- Contoh Pesan User -->
      <div class="flex items-start gap-3 justify-end bubble">
        <div class="bg-sky-600 px-4 py-2 rounded-2xl max-w-[80%] shadow">
          Hai, bisa jelaskan fitur Atha AI?
        </div>
        <img src="https://i.ibb.co/Gsr8GTh/user-icon.png" alt="User" class="w-8 h-8 rounded-full">
      </div>
    </div>

    <!-- Form Input -->
    <form id="chatForm" class="flex gap-2 mt-4">
      <input 
        id="msgInput" 
        type="text" 
        placeholder="Tulis pesan..." 
        class="flex-1 px-4 py-2 rounded-full bg-slate-800/80 border border-slate-600 placeholder-slate-400 text-white focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition"
        required
      >
      <button 
        type="submit" 
        class="px-6 py-2 bg-gradient-to-r from-sky-500 to-blue-600 hover:from-sky-600 hover:to-blue-700 rounded-full font-semibold shadow-lg hover:shadow-sky-500/50 transition-transform hover:scale-105"
      >
        Kirim
      </button>
    </form>
  </div>

  <script src="assets/app.js"></script>
</body>
</html>
