
# OpenAIChatGTP

A Laravel-based chatbot application powered by the OpenAI API (ChatGPT). This project demonstrates how to build an intelligent conversational interface using PHP, JavaScript, and the OpenAI language model.

🔗 **Live demo**: [https://your-vibration.com/](https://your-vibration.com/)

---

## 🧠 Features

- Seamless integration with OpenAI ChatGPT API
- Clean Laravel backend with API routes and controllers
- Frontend chat interface using Blade and JavaScript
- Stores and retrieves chat messages from a database
- Fully responsive and styled for conversational use

---

## 📁 Project Structure & Workflow

**Backend (Laravel):**
- `routes/web.php` – Defines the route to serve the chat interface
- `routes/api.php` – Defines API endpoint for chat messages
- `app/Http/Controllers/ChatController.php` – Handles input/output to/from OpenAI
- `app/Models/Message.php` – Eloquent model for storing messages
- `resources/views/chat.blade.php` – Chat UI built with Blade and JavaScript
- `.env` – Stores credentials including `OPENAI_API_KEY`

**Frontend:**
- Chat form submits message via AJAX to the Laravel API
- Message is saved to database and sent to OpenAI
- API responds with ChatGPT reply, which is stored and displayed in UI

**Workflow Overview:**
1. User enters message into the chat input
2. JavaScript sends it to the Laravel API (`/api/chat`)
3. Controller sends request to OpenAI using Guzzle HTTP client
4. OpenAI response is saved to DB and returned as JSON
5. JavaScript appends the response to the chat window

---

## 🚀 Getting Started

### Prerequisites
- PHP >= 8.1
- Composer
- Laravel 10+
- MySQL or another supported database
- OpenAI API key (get one at https://platform.openai.com/apps)

### Installation

```bash
git clone git@github.com:sashokrist/openAIChatGTP.git
cd openAIChatGTP
composer install
cp .env.example .env
php artisan key:generate
Configuration
Edit the .env file and set your database credentials and OpenAI API key:

env
Копиране
Редактиране
DB_DATABASE=your_database
DB_USERNAME=your_user
DB_PASSWORD=your_password

OPENAI_API_KEY=your_openai_api_key
Database Setup
bash
Копиране
Редактиране
php artisan migrate
Run the App
bash
Копиране
Редактиране
php artisan serve
Visit: http://localhost:8000

🖼️ Screenshots
Add screenshots to show the chat interface in action (currently referenced but not embedded).

🛠️ Tech Stack
Backend: Laravel, PHP, OpenAI API

Frontend: Blade, JavaScript, Bootstrap/Tailwind (if used)

Database: MySQL

API Integration: OpenAI GPT (ChatGPT)

🤝 Contributing
Pull requests and issues are welcome. If you have ideas for improving the chatbot logic or UI, feel free to fork the repo and submit changes.

📄 License
This project is open source. You are free to modify and use it in your own projects.

🔗 Author
Aleksander Keremidarov




