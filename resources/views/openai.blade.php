@extends('layouts.app2')

@section('content')
    <div
        class="relative min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <h1 class="text-center mb-4">
            <svg style="margin-right: 10px;" height="44px" width="44px" version="1.1" id="_x32_"
                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"
                 xml:space="preserve" fill="#d28383" stroke="#d28383"><g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <style type="text/css"> .st0 {
                            fill: white;
                        } </style>
                    <g>
                        <path class="st0"
                              d="M392.692,257.322c-1.172-8.125-2.488-16.98-3.807-25.984c-5.856-39.012-12.59-81.688-14.86-87.832 c-4.318-11.715-18.371-44.723-68.217-25.984c-15.738,5.926-18.812,11.93-41.648,8.93c-17.273-2.27-28.326-15.59-52.336-24.668 c-49.844-18.883-71.584,11.711-75.902,23.422c-2.27,6.148-9.004,67.121-14.86,106.133c-1.39,8.86-2.633,17.566-3.804,25.621 c37.256,7.535,84.174,12.879,138.705,12.879C309.541,269.837,355.801,264.716,392.692,257.322z"></path>
                        <path class="st0"
                              d="M443.707,306.509c-8.051-2.196-16.834-4.246-26.057-6.148c-1.83-0.805-3.66-1.535-5.49-2.27h-0.072 c-46.918,10.394-102.254,15.664-156.125,15.664c-53.652,0-108.768-5.27-155.541-15.516c-1.316,0.512-2.707,1.098-4.098,1.684 c-8.858,1.828-17.348,3.73-25.106,5.781l-0.148,0.074C27.008,317.49,0,333.372,0,350.939c0,36.012,114.549,65.289,256.035,65.289 c141.34,0,255.965-29.278,255.965-65.289C512,333.74,486.016,318.22,443.707,306.509z"></path>
                    </g>
                </g></svg>
            {{ __('ASK Jeeves')}}
            <svg style="margin-right: 10px;" height="44px" width="44px" version="1.1" id="_x32_"
                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"
                 xml:space="preserve" fill="#d28383" stroke="#d28383"><g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <style type="text/css"> .st0 {
                            fill: white;
                        } </style>
                    <g>
                        <path class="st0"
                              d="M392.692,257.322c-1.172-8.125-2.488-16.98-3.807-25.984c-5.856-39.012-12.59-81.688-14.86-87.832 c-4.318-11.715-18.371-44.723-68.217-25.984c-15.738,5.926-18.812,11.93-41.648,8.93c-17.273-2.27-28.326-15.59-52.336-24.668 c-49.844-18.883-71.584,11.711-75.902,23.422c-2.27,6.148-9.004,67.121-14.86,106.133c-1.39,8.86-2.633,17.566-3.804,25.621 c37.256,7.535,84.174,12.879,138.705,12.879C309.541,269.837,355.801,264.716,392.692,257.322z"></path>
                        <path class="st0"
                              d="M443.707,306.509c-8.051-2.196-16.834-4.246-26.057-6.148c-1.83-0.805-3.66-1.535-5.49-2.27h-0.072 c-46.918,10.394-102.254,15.664-156.125,15.664c-53.652,0-108.768-5.27-155.541-15.516c-1.316,0.512-2.707,1.098-4.098,1.684 c-8.858,1.828-17.348,3.73-25.106,5.781l-0.148,0.074C27.008,317.49,0,333.372,0,350.939c0,36.012,114.549,65.289,256.035,65.289 c141.34,0,255.965-29.278,255.965-65.289C512,333.74,486.016,318.22,443.707,306.509z"></path>
                    </g>
                </g></svg>
        </h1>
        <div class="container mt-5">
            <div class="row">
                <!-- Left Sidebar for History -->
                <div class="col-lg-3 d-none d-lg-block sidebar mt-3">
                    <h3 class="text-center">{{ __('Chat History') }}</h3>
                    @forelse ($sessions as $chat)
                        <div id="sidebar" class="chat-entry">
                            <a href="#" class="question" onclick="loadChatContent({{ $chat->id }}); return false;">
                                <h4>{{ auth()->user()->name }} Asked:</h4>
                                <h5 style="color: red;">{{ $chat->ask }}</h5></a>
                            <h4>AI Response:</h4>
                            <p>{{ Str::limit( $chat->response , 100) }}</p>
                        </div>
                        <hr style="border: white 1px solid">
                    @empty
                        <p>No chat history available.</p>
                    @endforelse
                </div>

                <!-- Main Chat Area -->
                <div class="col-lg-6 col-12">
                    <div class="card card-custom">
                        <div class="card-body">
                            <div id="chat" class="chat-box"></div>
                            <textarea id="userInput" class="form-control mb-3" rows="3" placeholder="Ask Sasho..."
                                      style="background: #343541; color: white"></textarea>
                            <button id="askButton" onclick="sendMessage()" class="btn btn-info w-100">
                                {{ __('ASK') }}
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 d-none d-lg-block sidebar mt-3">
                    <h3 class="text-center">{{ __('Most Asked') }}</h3>
                    <h4>{{ __('Food') }}</h4>
                    <p class="question"
                       data-question="{{ App::getLocale() == 'en' ? 'What Are Healthy Diet Options?' : __('What Are Healthy Diet Options?') }}">
                        {{ __('What Are Healthy Diet Options?') }}
                    </p>
                    <hr style="border: white 1px solid">
                    <p class="question"
                       data-question="{{ App::getLocale() == 'en' ? 'How to Cook a Specific Dish?' : __('How to Cook a Specific Dish?') }}">
                        {{ __('How to Cook a Specific Dish?') }}
                    </p>
                    <hr style="border: white 1px solid">
                    <p class="question"
                       data-question="{{ App::getLocale() == 'en' ? 'What Are the Benefits of [Specific Food/Diet]?' : __('What Are the Benefits of [Specific Food/Diet]?') }}">
                        {{ __('What Are the Benefits of [Specific Food/Diet]?') }}
                    </p>
                    <hr style="border: white 1px solid">
                    <p class="question"
                       data-question="{{ App::getLocale() == 'en' ? 'How to Lose/Gain Weight Through Diet?' : __('How to Lose/Gain Weight Through Diet?') }}">
                        {{ __('How to Lose/Gain Weight Through Diet?') }}
                    </p>
                    <hr style="border: white 1px solid">
                    <p class="question"
                       data-question="{{ App::getLocale() == 'en' ? 'What Are Food Allergies and Intolerances?' : __('What Are Food Allergies and Intolerances?') }}">
                        {{ __('What Are Food Allergies and Intolerances?') }}
                    </p>
                    <hr style="border: white 1px solid">
                    <h4>{{ __('Education') }}</h4>
                    <p class="question"
                       data-question="{{ App::getLocale() == 'en' ? 'Can you help me understand this math problem?' : __('Can you help me understand this math problem?') }}">
                        {{ __('Can you help me understand this math problem?') }}
                    </p>
                    <hr style="border: white 1px solid">
                    <p class="question"
                       data-question="{{ App::getLocale() == 'en' ? 'How do I improve my essay writing skills?' : __('How do I improve my essay writing skills?') }}">
                        {{ __('How do I improve my essay writing skills?') }}
                    </p>
                    <hr style="border: white 1px solid">
                    <p class="question"
                       data-question="{{ App::getLocale() == 'en' ? 'What are effective study techniques for exams?' : __('What are effective study techniques for exams?') }}">
                        {{ __('What are effective study techniques for exams?') }}
                    </p>
                    <hr style="border: white 1px solid">
                    <p class="question"
                       data-question="{{ App::getLocale() == 'en' ? 'Can you explain the theory of relativity in simple terms?' : __('Can you explain the theory of relativity in simple terms?') }}">
                        {{ __('Can you explain the theory of relativity in simple terms?') }}
                    </p>
                    <hr style="border: white 1px solid">
                    <p class="question"
                       data-question="{{ App::getLocale() == 'en' ? 'What should I consider when choosing a college major?' : __('What should I consider when choosing a college major?') }}">
                        {{ __('What should I consider when choosing a college major?') }}
                    </p>
                    <hr style="border: white 1px solid">
                    <h4>{{ __('Programming Code') }}</h4>
                    <p class="question"
                       data-question="{{ App::getLocale() == 'en' ? 'Why is my code not working?' : __('Why is my code not working?') }}">
                        {{ __('Why is my code not working?') }}
                    </p>
                    <hr style="border: white 1px solid">
                    <p class="question"
                       data-question="{{ App::getLocale() == 'en' ? 'How do I start learning [a specific programming language]?' : __('How do I start learning [a specific programming language]?') }}">
                        {{ __('How do I start learning [a specific programming language]?') }}
                    </p>
                    <hr style="border: white 1px solid">
                    <p class="question"
                       data-question="{{ App::getLocale() == 'en' ? 'How can I solve this problem algorithmically?' : __('How can I solve this problem algorithmically?') }}">
                        {{ __('How can I solve this problem algorithmically?') }}
                    </p>
                    <hr style="border: white 1px solid">
                    <p class="question"
                       data-question="{{ App::getLocale() == 'en' ? 'What does this function/method in [programming language] do?' : __('What does this function/method in [programming language] do?') }}">
                        {{ __('What does this function/method in [programming language] do?') }}
                    </p>
                    <hr style="border: white 1px solid">
                    <p class="question"
                       data-question="{{ App::getLocale() == 'en' ? 'How can I optimize this code for better performance?' : __('How can I optimize this code for better performance?') }}">
                        {{ __('How can I optimize this code for better performance?') }}
                    </p>
                    <hr style="border: white 1px solid">
                    <h4>{{ __('Sport') }}</h4>
                    <p class="question"
                       data-question="{{ App::getLocale() == 'en' ? 'What are the basic rules of [specific sport]?' : __('What are the basic rules of [specific sport]?') }}">
                        {{ __('What are the basic rules of [specific sport]?') }}
                    </p>
                    <hr style="border: white 1px solid">
                    <p class="question"
                       data-question="{{ App::getLocale() == 'en' ? 'Who holds the record for [specific achievement] in [sport]?' : __('Who holds the record for [specific achievement] in [sport]?') }}">
                        {{ __('Who holds the record for [specific achievement] in [sport]?') }}
                    </p>
                    <hr style="border: white 1px solid">
                    <p class="question"
                       data-question="{{ App::getLocale() == 'en' ? 'How can I improve my skills in [specific sport]?' : __('How can I improve my skills in [specific sport]?') }}">
                        {{ __('How can I improve my skills in [specific sport]?') }}
                    </p>
                    <hr style="border: white 1px solid">
                    <p class="question"
                       data-question="{{ App::getLocale() == 'en' ? 'What are the best exercises for staying fit for [specific sport]?' : __('What are the best exercises for staying fit for [specific sport]?') }}">
                        {{ __('What are the best exercises for staying fit for [specific sport]?') }}
                    </p>
                    <hr style="border: white 1px solid">
                    <p class="question"
                       data-question="{{ App::getLocale() == 'en' ? 'When is the next [major sporting event]?' : __('When is the next [major sporting event]?') }}">
                        {{ __('When is the next [major sporting event]?') }}
                    </p>
                    <hr style="border: white 1px solid">
                </div>
            </div>
            @include('partials.footer')
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.question').forEach(function (p) {
                p.addEventListener('click', function () {
                    document.getElementById('userInput').value = this.getAttribute('data-question');
                });
            });
        });
    </script>
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
                body: JSON.stringify({messages: [{role: 'user', content: userMessage}]})
            })
                .then(response => response.json())
                .then(data => {
                    displayResponse(data);
                    document.getElementById('askButton').innerText = 'ASK';
                    updateUserInputField();
                    updateChatHistory();
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
                    const sidebarDiv = document.getElementById('sidebar');
                    sidebarDiv.innerHTML = '';
                    data.forEach(chat => {
                        const chatEntry = `<div class="chat-entry">
                                        <h4>User Asked:</h4>
                                        <h5 style="color: red;">${chat.ask}</h5>
                                        <h4>AI Response:</h4>
                                        <p>${chat.response}</p>
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
                chatDiv.scrollTop = chatDiv.scrollHeight;
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
            fetch(`/chat-content/${chatId}`)
                .then(response => response.json())
                .then(data => {
                    const chatBox = document.getElementById('chat');
                    chatBox.innerHTML = `<strong>{{ auth()->user()->name }} asked:</strong> ${data.ask}<br>
                                 <strong>AI Response:</strong> ${data.response}`;
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
@endsection
