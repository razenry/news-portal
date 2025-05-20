<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'News Portal' }}</title>
    <meta name="description"
        content="{{ $description ?? 'Berita terkini dan terpercaya dari Yayasan, SMK, SMP, SDI, TK-RA, Serta PONPES AL AMANAH AL-BANTANI.' }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('logo.png') }}" type="image/x-icon">
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        <script>
            // On page load or when changing themes, best to add inline in `head` to avoid FOUC
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                    '(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark')
            }
        </script>

        <style>
            .tiptap-prose {
                width: 100%;
                max-width: 100%;
                box-sizing: border-box;
                overflow-wrap: break-word;
                word-wrap: break-word;
                word-break: break-word;
                font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
                line-height: 1.6;
                color: #333;
                margin: 0 auto;
                padding: 0 1rem;
            }

            .dark .tiptap-prose {
                color: #e5e7eb;
            }

            /* Typography Hierarchy */
            .tiptap-prose h1 {
                font-size: 2.5rem;
                font-weight: 800;
                line-height: 1.2;
                letter-spacing: -0.025em;
                color: #111827;
                margin: 1.5rem 0 1rem 0;
                padding-bottom: 0.5rem;
                border-bottom: 2px solid #e5e7eb;
            }

            .tiptap-prose h2 {
                font-size: 2rem;
                font-weight: 700;
                line-height: 1.25;
                color: #1f2937;
                margin: 2.5rem 0 1rem 0;
                position: relative;
                padding-left: 1.25rem;
            }

            .tiptap-prose h2:before {
                content: '';
                position: absolute;
                left: 0;
                top: 0.25em;
                height: 1em;
                width: 5px;
                background: #3b82f6;
                border-radius: 3px;
            }

            .tiptap-prose h3 {
                font-size: 1.5rem;
                font-weight: 600;
                line-height: 1.3;
                color: #1f2937;
                margin: 2rem 0 0.75rem 0;
            }

            .tiptap-prose h4 {
                font-size: 1.25rem;
                font-weight: 500;
                color: #374151;
                margin: 1.5rem 0 0.5rem 0;
            }

            /* Paragraph & Text Elements */
            .tiptap-prose p {
                font-size: 1.125rem;
                line-height: 1.7;
                color: #4b5563;
                margin: 0 0 1.25rem 0;
            }

            .tiptap-prose a {
                color: #2563eb;
                font-weight: 500;
                text-decoration: none;
                background-image: linear-gradient(currentColor, currentColor);
                background-position: 0% 100%;
                background-repeat: no-repeat;
                background-size: 0% 2px;
                transition: background-size 0.3s, color 0.3s;
                padding-bottom: 2px;
            }

            .tiptap-prose a:hover {
                color: #1e40af;
                background-size: 100% 2px;
            }

            /* Lists */
            .tiptap-prose ul,
            .tiptap-prose ol {
                color: #4b5563;
                margin: 0 0 1.25rem 0;
                padding-left: 1.5rem;
            }

            .tiptap-prose ul {
                list-style-type: none;
                padding-left: 1.25rem;
            }

            .tiptap-prose ul li {
                position: relative;
                padding-left: 1.5rem;
                margin-bottom: 0.5rem;
                line-height: 1.6;
            }

            .tiptap-prose ul li:before {
                content: '•';
                position: absolute;
                left: 0;
                color: #3b82f6;
                font-weight: bold;
                font-size: 1.2em;
            }

            .tiptap-prose ol {
                list-style-type: decimal;
                list-style-position: outside;
            }

            .tiptap-prose li {
                margin-bottom: 0.5rem;
                line-height: 1.6;
            }

            /* Text Formatting */
            .tiptap-prose strong {
                font-weight: 600;
                color: #111827;
            }

            .tiptap-prose em {
                font-style: italic;
                color: #4b5563;
            }

            /* Blockquotes */
            .tiptap-prose blockquote {
                border-left: 4px solid #3b82f6;
                padding: 1.5rem 1.5rem 1.5rem 2rem;
                margin: 1.5rem 0;
                font-style: italic;
                color: #4b5563;
                background-color: rgba(59, 130, 246, 0.05);
                border-radius: 0 8px 8px 0;
                position: relative;
                font-size: 1.125rem;
            }

            .tiptap-prose blockquote:before {
                content: '"';
                position: absolute;
                top: 0;
                left: 0.5rem;
                font-size: 3rem;
                color: rgba(59, 130, 246, 0.2);
                line-height: 1;
            }

            /* Code & Preformatted */
            .tiptap-prose pre {
                background-color: #1f2937;
                border-radius: 0.75rem;
                padding: 1.25rem;
                margin: 1.5rem 0;
                color: #f3f4f6;
                font-family: 'Menlo', 'Monaco', 'Consolas', monospace;
                font-size: 0.875rem;
                line-height: 1.5;
                overflow-x: auto;
                white-space: pre-wrap;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .tiptap-prose code {
                background-color: #f3f4f6;
                border-radius: 0.375rem;
                padding: 0.2rem 0.4rem;
                color: #3b82f6;
                font-family: 'Menlo', 'Monaco', 'Consolas', monospace;
                font-size: 0.875rem;
            }

            /* Tables */
            .tiptap-prose table {
                width: 100%;
                margin: 1.5rem 0;
                border-collapse: collapse;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
                overflow: hidden;
            }

            .tiptap-prose th {
                background-color: #f3f4f6;
                font-weight: 600;
                padding: 0.75rem 1rem;
                text-align: left;
                color: #374151;
                border: 2px solid #e5e7eb;
            }

            .tiptap-prose td {
                padding: 0.75rem 1rem;
                color: #6b7280;
                border-top: 1px solid #e5e7eb;
            }

            .tiptap-prose tr:hover td {
                background-color: rgba(59, 130, 246, 0.05);
            }

            /* Images */
            .tiptap-prose img {
                border-radius: 0.75rem;
                box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
                max-width: 100%;
                height: auto;
                margin: 1.5rem auto;
                display: block;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .tiptap-prose img:hover {
                transform: translateY(-2px);
                box-shadow: 0 15px 25px rgba(0, 0, 0, 0.15);
            }

            /* Embeds */
            .tiptap-prose iframe {
                width: 100%;
                border-radius: 0.75rem;
                box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
                margin: 1.5rem 0;
                border: none;
                aspect-ratio: 16/9;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .tiptap-prose iframe:hover {
                transform: translateY(-2px);
                box-shadow: 0 15px 25px rgba(0, 0, 0, 0.15);
            }

            /* Horizontal Rule */
            .tiptap-prose hr {
                border: none;
                height: 1px;
                background-color: #e5e7eb;
                margin: 2rem 0;
                position: relative;
            }

            .tiptap-prose hr:after {
                content: "§";
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                background: white;
                padding: 0 1rem;
                color: #9ca3af;
                font-size: 1rem;
            }

            /* Table of Contents */
            .tiptap-prose .toc {
                background-color: #eff6ff;
                border-radius: 1rem;
                padding: 1.25rem 1.5rem;
                margin: 1.5rem 0;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
                border-left: 4px solid #3b82f6;
            }

            .tiptap-prose .toc-title {
                font-weight: 700;
                font-size: 1.125rem;
                color: #1f2937;
                margin-bottom: 0.75rem;
            }

            .tiptap-prose .toc ul {
                list-style: none;
                padding-left: 0;
                margin: 0;
            }

            .tiptap-prose .toc li {
                margin-bottom: 0.5rem;
            }

            .tiptap-prose .toc a {
                color: #2563eb;
                font-weight: 500;
            }

            /* Dark Mode Styles */
            .dark .tiptap-prose {
                color: #e5e7eb;
            }

            .dark .tiptap-prose h1,
            .dark .tiptap-prose h2,
            .dark .tiptap-prose h3,
            .dark .tiptap-prose h4 {
                color: #f9fafb;
            }

            .dark .tiptap-prose p,
            .dark .tiptap-prose li {
                color: #d1d5db;
            }

            .dark .tiptap-prose blockquote {
                background-color: rgba(59, 130, 246, 0.1);
                color: #e5e7eb;
            }

            .dark .tiptap-prose pre {
                background-color: #111827;
            }

            .dark .tiptap-prose code {
                background-color: #1f2937;
            }

            .dark .tiptap-prose th {
                background-color: #1f2937;
                color: #f3f4f6;
                border-bottom-color: #374151;
            }

            .dark .tiptap-prose td {
                color: #d1d5db;
                border-top-color: #374151;
            }

            .dark .tiptap-prose hr {
                background-color: #374151;
            }

            .dark .tiptap-prose hr:after {
                background: #111827;
            }

            .dark .tiptap-prose .toc {
                background-color: #1f2937;
            }

            .dark .tiptap-prose .toc-title {
                color: #f9fafb;
            }

            /* Responsive Adjustments */
            @media (max-width: 768px) {
                .tiptap-prose h1 {
                    font-size: 2rem;
                }

                .tiptap-prose h2 {
                    font-size: 1.75rem;
                }

                .tiptap-prose h3 {
                    font-size: 1.5rem;
                }

                .tiptap-prose p {
                    font-size: 1rem;
                }
            }

            @media (max-width: 640px) {
                .tiptap-prose h1 {
                    font-size: 1.75rem;
                }

                .tiptap-prose h2 {
                    font-size: 1.5rem;
                }

                .tiptap-prose h3 {
                    font-size: 1.25rem;
                }
            }

            /* Animations */
            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(10px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .tiptap-prose h1,
            .tiptap-prose h2,
            .tiptap-prose h3,
            .tiptap-prose img,
            .tiptap-prose iframe {
                animation: fadeIn 0.5s ease-out forwards;
            }
        </style>
    @else
        <style>

        </style>
    @endif
</head>

<body class="bg-white dark:bg-gray-900 flex flex-col min-h-screen">


    <livewire:layout.navbar />

    <div class="mt-14 flex-grow">
        {{ $slot ?? 'Not Found' }}
    </div>

    <livewire:layout.footer />

    @livewireScripts
    <!-- <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script> -->
</body>

</html>
