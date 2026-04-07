<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel Management System - README</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white font-sans">

  <div class="max-w-4xl mx-auto px-6 py-12">
    <header class="mb-10 text-center">
      <h1 class="text-4xl md:text-5xl font-extrabold text-yellow-400 mb-2">Hotel Management System</h1>
      <p class="text-gray-300 text-lg md:text-xl">Laravel-based application for managing hotel bookings, customers, and rooms efficiently.</p>
    </header>

    <section class="mb-10">
      <h2 class="text-2xl font-bold text-blue-400 mb-4">Features</h2>
      <ul class="list-disc list-inside space-y-2 text-gray-300">
        <li><strong>Room Booking:</strong> Easily manage room availability and reservations.</li>
        <li><strong>Customer Management:</strong> Store and track customer details.</li>
        <li><strong>Admin Dashboard:</strong> View all bookings, customers, and reports.</li>
        <li><strong>Billing & Invoicing:</strong> Automatically generate invoices for customers.</li>
        <li><strong>Secure Authentication:</strong> Admin login to manage hotel operations.</li>
        <li><strong>Responsive Design:</strong> Works seamlessly on desktop, tablet, and mobile.</li>
      </ul>
    </section>

    <section class="mb-10">
      <h2 class="text-2xl font-bold text-blue-400 mb-4">Technologies Used</h2>
      <div class="flex flex-wrap gap-3 text-gray-300">
        <span class="bg-blue-700/40 px-3 py-1 rounded-full">Laravel</span>
        <span class="bg-green-700/40 px-3 py-1 rounded-full">PHP</span>
        <span class="bg-indigo-700/40 px-3 py-1 rounded-full">MySQL</span>
        <span class="bg-pink-700/40 px-3 py-1 rounded-full">Bootstrap</span>
        <span class="bg-yellow-700/40 px-3 py-1 rounded-full">HTML</span>
        <span class="bg-purple-700/40 px-3 py-1 rounded-full">CSS</span>
      </div>
    </section>

    <section class="mb-10">
      <h2 class="text-2xl font-bold text-blue-400 mb-4">Installation</h2>
      <ol class="list-decimal list-inside space-y-2 text-gray-300">
        <li>Clone the repository: <code class="bg-gray-800 px-2 py-1 rounded">git clone https://github.com/yourusername/hotel-management-system.git</code></li>
        <li>Navigate to the project folder: <code class="bg-gray-800 px-2 py-1 rounded">cd hotel-management-system</code></li>
        <li>Install dependencies: <code class="bg-gray-800 px-2 py-1 rounded">composer install</code></li>
        <li>Copy .env file and set database credentials: <code class="bg-gray-800 px-2 py-1 rounded">cp .env.example .env</code></li>
        <li>Generate app key: <code class="bg-gray-800 px-2 py-1 rounded">php artisan key:generate</code></li>
        <li>Run migrations: <code class="bg-gray-800 px-2 py-1 rounded">php artisan migrate</code></li>
        <li>Start the server: <code class="bg-gray-800 px-2 py-1 rounded">php artisan serve</code></li>
        <li>Open <code class="bg-gray-800 px-2 py-1 rounded">http://localhost:8000</code> in your browser.</li>
      </ol>
    </section>

    <section class="mb-10">
      <h2 class="text-2xl font-bold text-blue-400 mb-4">Usage</h2>
      <p class="text-gray-300 mb-2">- Admin can add, edit, and delete rooms.</p>
      <p class="text-gray-300 mb-2">- Manage customer bookings and view booking history.</p>
      <p class="text-gray-300 mb-2">- Generate invoices for completed bookings.</p>
    </section>

    <section class="mb-10">
      <h2 class="text-2xl font-bold text-blue-400 mb-4">Demo</h2>
      <p class="text-gray-300">Add screenshots or a link to the live demo here.</p>
    </section>

    <section>
      <h2 class="text-2xl font-bold text-blue-400 mb-4">License</h2>
      <p class="text-gray-300">This project is licensed under the MIT License.</p>
    </section>
  </div>

</body>
</html>
