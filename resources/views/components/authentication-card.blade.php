<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0" style="background: linear-gradient(rgba(0,0,0,.55), rgba(0,0,0,.55)), url('assets/imgs/book-table-img.jpg') center/cover no-repeat fixed;">
    <div>
        {{ $logo }}
    </div>

    <style>
      /* Scoped styles for dark auth card */
      .dark-auth-card {
        background: rgba(0,0,0,.72);
        color: #fff;
        border: 1px solid rgba(255,255,255,.15);
        backdrop-filter: blur(2px);
      }
      .dark-auth-card label { color: #fff; }
      .dark-auth-card .text-gray-600 { color: #e5e7eb !important; }
      .dark-auth-card a { color: #93c5fd; }
      .dark-auth-card a:hover { color: #bfdbfe; }
      .dark-auth-card input,
      .dark-auth-card textarea,
      .dark-auth-card select {
        background-color: #0f172a !important; /* slate-900 */
        color: #fff !important;
        border-color: #334155 !important; /* slate-600 */
      }
      .dark-auth-card input:focus,
      .dark-auth-card textarea:focus,
      .dark-auth-card select:focus { outline: none; box-shadow: 0 0 0 2px rgba(59,130,246,.4); border-color: #60a5fa !important; }
    </style>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg dark-auth-card">
        {{ $slot }}
    </div>
</div>
