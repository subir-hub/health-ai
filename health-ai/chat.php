<?php session_start() ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Virtual AI Doctor</title>
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
  <link rel="stylesheet" as="style" onload="this.rel='stylesheet'"
    href="https://fonts.googleapis.com/css2?display=swap&amp;family=Lexend%3Awght%40400%3B500%3B700%3B900&amp;family=Noto+Sans%3Awght%40400%3B500%3B700%3B900" />


  <link rel="icon" type="image/x-icon" href="data:image/x-icon;base64," />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #f4f7fa;
      font-family: 'Segoe UI', sans-serif;
      padding-top: 70px;
    }

    .navbar {
      background-color: #007bff;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
    }

    .navbar-brand {
      font-weight: bold;
      color: white;
    }

    .chat-container {
      max-width: 700px;
      margin: auto;
      background: white;
      border-radius: 20px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
      display: flex;
      flex-direction: column;
      height: 80vh;
      overflow: hidden;
    }

    .chat-header {
      border-bottom: 1px solid #ddd;
      background-color: #fff;
      display: flex;
      align-items: center;
      gap: 15px;
      padding: 15px 20px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }

    .chat-header img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      position: relative;
      border: 2px solid white;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .online-dot {
      position: absolute;
      bottom: 10px;
      right: 12px;
      width: 12px;
      height: 12px;
      background-color: #28a745;
      border: 2px solid white;
      border-radius: 50%;
    }

    .chat-header .text-start {
      flex-grow: 1;
    }

    .chat-messages {
      flex: 1;
      overflow-y: auto;
      padding: 20px;
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .message {
      max-width: 75%;
      padding: 10px 15px;
      border-radius: 20px;
      animation: fadeIn 0.3s ease-in;
    }

    .user-message {
      background-color: #d1e7dd;
      align-self: flex-end;
      text-align: right;
    }

    .ai-message {
      background-color: #f0f0f0;
      align-self: flex-start;
      text-align: left;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(5px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .chat-input {
      border-top: 1px solid #ddd;
      padding: 10px 20px;
      display: flex;
      gap: 10px;
      align-items: center;
    }

    .chat-input input {
      flex: 1;
      border-radius: 30px;
      padding: 10px 20px;
      border: 1px solid #ccc;
    }

    .chat-input button {
      border-radius: 50px;
      border: none;
      background-color: #007bff;
      color: white;
      padding: 10px 16px;
    }

    .chat-input button:hover {
      background-color: #0056b3;
    }

    #typingIndicator {
      margin-top: 5px;
      font-size: 13px;
    }

    #typingIndicator .dot {
      height: 6px;
      width: 6px;
      margin-right: 3px;
      background-color: #6c757d;
      border-radius: 50%;
      display: inline-block;
      animation: bounce 1s infinite ease-in-out;
    }

    #typingIndicator .dot:nth-child(2) {
      animation-delay: 0.2s;
    }

    #typingIndicator .dot:nth-child(3) {
      animation-delay: 0.4s;
    }

    @keyframes bounce {

      0%,
      80%,
      100% {
        transform: scale(0);
      }

      40% {
        transform: scale(1);
      }
    }

    .floating-help {
      position: fixed;
      bottom: 20px;
      right: 20px;
      z-index: 999;
    }

    .floating-help button {
      border-radius: 50%;
      background-color: #17a2b8;
      color: white;
      padding: 12px 15px;
      font-size: 18px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    @media (max-width: 768px) {
      .chat-container {
        height: 90vh;
        margin: 10px;
      }
    }
  </style>
</head>

<body class="d-flex flex-column min-vh-100 bg-light">

  <?php include './header.php' ?>

  <div class="chat-container my-5">
    <div class="chat-header shadow-sm">
      <div class="position-relative">
        <img src="./images/6466809e33227b31f63dc274_img_doctor.png" alt="AI Doctor" />
        <span class="online-dot"></span>
      </div>
      <div class="text-start">
        <h5 class="fw-bold text-primary mb-0">AI Doctor</h5>
        <small class="text-muted">Your smart virtual medical assistant</small>
        <div id="typingIndicator" class="text-secondary mt-1 d-none">
          <span class="dot"></span><span class="dot"></span><span class="dot"></span> typing...
        </div>
      </div>
    </div>

    <div class="chat-messages" id="chatMessages"></div>

    <div class="chat-input">
      <input type="text" id="userInput" placeholder="Type your message..." />
      <button id="micBtn"><i class="fas fa-microphone"></i></button>
      <button id="sendBtn"><i class="fas fa-paper-plane"></i></button>
    </div>
  </div>

  <div class="floating-help">
    <button onclick="alert('Example Commands:\n- What is fever?\n- Suggest a diet plan\n- How to treat cold?')">
      <i class="fas fa-question-circle"></i>
    </button>
  </div>

  <footer class="bg-[#0e141b] py-6 border-t border-[#2c3e50]">
    <div class="max-w-7xl mx-auto px-4 text-center">
      <p class="text-sm text-gray-400">
        © 2024 — Developed by
        <a href="https://github.com/subir-hub" target="_blank"
          class="text-white font-semibold hover:underline">
          Subir Ghosh
        </a>
      </p>
    </div>
  </footer>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    function appendMessage(content, sender) {
      const messageDiv = $('<div></div>').addClass('message').addClass(sender === 'user' ? 'user-message' : 'ai-message').text(content);
      $('#chatMessages').append(messageDiv);
      $('#chatMessages').scrollTop($('#chatMessages')[0].scrollHeight);
    }

    function typeAIMessage(text) {
      const messageDiv = $('<div></div>').addClass('message ai-message').appendTo('#chatMessages');
      let index = 0;

      function typeChar() {
        if (index < text.length) {
          messageDiv.append(text.charAt(index));
          index++;
          setTimeout(typeChar, 5);
          $('#chatMessages').scrollTop($('#chatMessages')[0].scrollHeight);
        } else {
          $('#typingIndicator').addClass('d-none');
        }
      }

      typeChar();
    }

    $('#sendBtn').click(function() {
      const message = $('#userInput').val().trim();
      if (message === '') return;

      appendMessage(message, 'user');
      $('#userInput').val('');
      $('#typingIndicator').removeClass('d-none');

      $.ajax({
        url: 'api.php',
        method: 'POST',
        contentType: 'application/json',
        data: JSON.stringify({
          prompt: message
        }),
        success: function(res) {
          setTimeout(() => {
            typeAIMessage(res.reply);
          }, 100);
        },
        error: function() {
          $('#typingIndicator').addClass('d-none');
          appendMessage('Sorry, could not connect to the assistant.', 'ai');
        }
      });
    });

    $('#userInput').keypress(function(e) {
      if (e.which === 13) {
        $('#sendBtn').click();
        return false;
      }
    });

    $('#micBtn').click(function() {
      alert('🎤 Voice input coming soon!');
    });
  </script>
</body>

</html>