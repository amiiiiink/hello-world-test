{{-- resources/views/hello.blade.php --}}
@props(['title' => 'Hello World', 'subtitle' => 'Welcome to modern CSS demo'])
<head> @vite(['resources/css/app.css'])</head>
<section class="hw-root" aria-labelledby="hw-title">
    <div class="hw-card">
        <header class="hw-header">
            <h1 id="hw-title" class="hw-title">{{ $title }}</h1>
            <p class="hw-subtitle">{{ $subtitle }}</p>
        </header>

        <div class="hw-body">
            <p>این یک کامپوننت با Tailwind و CSS Variables است.</p>

            <div class="hw-grid">
                <div class="hw-item">Responsive card</div>
                <div class="hw-item">Container query</div>
                <div class="hw-item">Clamp font-size</div>
                <div class="hw-item">Aspect ratio</div>
            </div>
        </div>

        <footer class="hw-footer">
            <a class="hw-btn" href="#" role="button">Try me</a>
        </footer>
    </div>
</section>
