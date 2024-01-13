<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpenAI Chat</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        p {
            margin: 0;
            color: white;
        }
        h1, h2, h3, h4, h5, h6 {
            font-weight: bold;
            color: white;
        }
        .container {
            max-width: 100%;
            background: #343541;
            margin: auto;
            padding: 20px;
        }
        .chat-box {
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #343541;
            color: white;
            font-size: 18px;
            height: 300px;
            overflow-y: auto;
        }
        .card-custom {
            background: #343541;
        }
        .response {
            background-color: black;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
        }

        .sidebar {
            border: 1px solid #ddd;
            background-color: black;
            width: 100%;
            resize: both; /* Make div resizable in both directions */
            overflow: auto; /* Add scrollbars as necessary */
            max-height: 100%; /* Set a maximum height */
            padding: 10px;
        }


        button {
            background-color: #343541;
            color: white;
            border: 1px solid white;
        }
          button:hover {
                background-color: #343541;
                color: white;
                border: 1px solid white;
            }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">OpenAI</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Right-aligned items -->
            <ul class="navbar-nav ml-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile.edit') }}">Profile</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endif
                @endauth
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <h1 class="text-center mb-4">
            <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M11 6C13.7614 6 16 8.23858 16 11M16.6588 16.6549L21 21M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
            Ask Sasho, he knows
            <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M11 6C13.7614 6 16 8.23858 16 11M16.6588 16.6549L21 21M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>    </h1>
        <div class="container mt-5">
            <div class="row">
                <!-- Left Sidebar for History -->
                <div  class="col-md-3 sidebar mt-3">
                    <h1 class="text-center">Chat History</h1>

                    @forelse ($sessions as $chat)
                        <div id="sidebar" class="chat-entry">
                            <a href="#" onclick="loadChatContent({{ $chat->id }}); return false;">
                                <h4>User Asked:</h4>
                            </a>
                            <h5 style="color: red;">{{ $chat->ask }}</h5>

                            <h4>AI Response:</h4>
                            <h6>{{ Str::limit( $chat->response , 100) }}</h6>
                        </div>
                        <hr style="border: white 1px solid">
                    @empty
                        <p>No chat history available.</p>
                    @endforelse
                </div>

                <!-- Main Chat Area -->
                <div class="col-md-9">
                    <div class="card card-custom">
                        <div class="card-body">
                            <div id="chat" class="chat-box"></div>
                            <textarea id="userInput" class="form-control mb-3" rows="3" placeholder="Ask Sasho..." style="background: #343541; color: white"></textarea>
                            <button id="askButton" onclick="sendMessage()" class="btn btn-info w-100">
                                ASK
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="text-center mt-4">
                <h6>All rights reserved SASHO_DEV 2023</h6>
            </footer>
        </div>
    </div>

</div>

<script>
    function sendMessage() {
        const userInputField = document.getElementById('userInput');
        const userMessage = userInputField.value;

        document.getElementById('askButton').innerText = 'Please wait...';

        fetch('/openai/completion', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ messages: [{ role: 'user', content: userMessage }] })
        })
            .then(response => response.json())
            .then(data => {
                displayResponse(data);
                document.getElementById('askButton').innerText = 'ASK';
                updateUserInputField();
                updateChatHistory(); // Function to update the chat history
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('askButton').innerText = 'ASK';
            });
    }

    function updateUserInputField() {
        document.getElementById('userInput').value = '';
    }

    function updateChatHistory() {
        fetch('/chat-history')
            .then(response => response.json())
            .then(data => {
                const sidebarDiv = document.getElementById('sidebar'); // Make sure you have an ID for your sidebar
                sidebarDiv.innerHTML = ''; // Clear current content
                data.forEach(chat => {
                    const chatEntry = `<div class="chat-entry">
                                        <h4>User Asked:</h4>
                                        <h5 style="color: red;">${chat.ask}</h5>
                                        <h4>AI Response:</h4>
                                        <h6>${chat.response}</h6>
                                   </div>`;
                    sidebarDiv.innerHTML += chatEntry;
                });
            });
    }



    function displayResponse(data) {
        const chatDiv = document.getElementById('chat');
        const userInputField = document.getElementById('userInput');
        const userMessage = userInputField.value;
        if (data.choices && data.choices.length > 0) {
            const aiResponse = data.choices[0].message.content;
            chatDiv.innerHTML += `<div class="response p-3 mb-2">
                               <strong style="color: red;">You:</strong> ${userMessage}<br>
                                <strong>AI:</strong> ${aiResponse}
                              </div>`;
            chatDiv.scrollTop = chatDiv.scrollHeight; // Scroll to the bottom of the chat box
            document.getElementById('userInput').value = '';
        }
    }

    function formatResponse(response) {
        // Check for programming code
        if (response.trim().startsWith('```') && response.trim().endsWith('```')) {
            const code = response.trim().slice(3, -3);
            return `<pre><code>${escapeHtml(code)}</code></pre>`;
        }

        // Check for numbered lists
        if (response.match(/^\d+\..+/gm)) {
            const listItems = response.split(/\n/).filter(item => item.match(/^\d+\..+/)).map(item => `<li>${item.trim().substring(item.indexOf('.') + 1).trim()}</li>`).join('');
            return `<ol>${listItems}</ol>`;
        }

        // Split response into sentences for other cases
        const sentences = response.split(/\n/).filter(line => !line.match(/^\d+\..+/));

        return sentences.map(sentence => {
            if (sentence.includes('http://') || sentence.includes('https://')) { // Simple check for links
                const link = sentence.match(/(https?:\/\/[^\s]+)/g)[0];
                return sentence.replace(link, `<a href="${link}" target="_blank">${link}</a>`);
            } else {
                return `<p>${sentence.trim()}</p>`;
            }
        }).join('');
    }

    function escapeHtml(unsafe) {
        return unsafe
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }

    function loadChatContent(chatId) {
        fetch(`/chat-content/${chatId}`)  // Replace with your actual endpoint
            .then(response => response.json())
            .then(data => {
                const chatBox = document.getElementById('chat');
                chatBox.innerHTML = `<strong>User Asked:</strong> ${data.ask}<br>
                                 <strong>AI Response:</strong> ${data.response}`;
            })
            .catch(error => console.error('Error:', error));
    }

</script>
</body>
</html>
