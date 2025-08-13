<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Atha AI</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body class="bg-slate-900 text-white flex items-center justify-center min-h-screen">
  <div class="w-full max-w-2xl p-4">
    <h1 class="text-3xl font-bold mb-6 text-center text-sky-400">Atha AI</h1>
    <div id="chat" class="space-y-4 h-96 overflow-y-auto bg-slate-800 rounded-lg p-4 mb-4"></div>
    <form id="chatForm" class="flex gap-2">
      <input id="msgInput" type="text" placeholder="Tulis pesan..." class="flex-1 px-4 py-2 rounded bg-slate-700 focus:outline-none focus:ring-2 focus:ring-sky-500" required>
      <button type="submit" class="px-4 py-2 bg-sky-600 hover:bg-sky-700 rounded font-semibold">Kirim</button>
    </form>
  </div>
  <script src="assets/app.js"></script>
</body>
</html>
