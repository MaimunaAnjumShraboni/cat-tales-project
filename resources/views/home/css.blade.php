<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with FoodHut landing page.">
    <meta name="author" content="Devcrud">
    <title>Cat Tales | Free Bootstrap 4.3.x template</title>
   
    <!-- font icons -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/animate/animate.css">
    <!-- Bootstrap + FoodHut main styles -->
	<link rel="stylesheet" href="assets/css/foodhut.css">
    <style>
      /* Ensure uniform gallery thumbnails */
      .gallary .gallary-item { position: relative; }
      .gallary .gallary-img {
        width: 100%;
        height: 220px; /* uniform height */
        object-fit: cover; /* crop to fill without distortion */
        display: block;
      }
      /* Optional: tweak at larger screens */
      @media (min-width: 992px) {
        .gallary .gallary-img { height: 240px; }
      }
      /* Make overlay cover image area correctly */
      .gallary .gallary-item .gallary-overlay{
        position: absolute; inset: 0; display: flex; align-items: center; justify-content: center;
        opacity: 0; transition: opacity .2s ease-in-out;
      }
      .gallary .gallary-item:hover .gallary-overlay{ opacity: 1; }

      /* Reviews section visibility on dark background */
      #testmonial { color: #fff; }
      #testmonial .testmonial-card {
        background: transparent;
        border: 1px solid rgba(255,255,255,0.15);
        color: #fff;
      }
      #testmonial .testmonial-title,
      #testmonial .testmonial-subtitle { color: #fff; }
      #testmonial .testmonial-body p { color: rgba(255,255,255,0.9); margin-bottom: 0; }
      #testmonial .btn { color: #fff; border-color: #fff; }

      /* Breed badge styling on cat cards */
      .breed-badge {
        display: inline-block;
        background: #dc3545; /* red */
        color: #fff;
        padding: .35rem .75rem;
        border-radius: 9999px; /* pill */
        font-size: .85rem;
        letter-spacing: .5px;
        font-weight: 600;
        text-transform: uppercase;
        box-shadow: 0 2px 6px rgba(220,53,69,.35);
      }
    </style>
</head>
