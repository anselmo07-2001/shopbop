<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Contact Message</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-4">
        <div class="card border-primary shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">New Contact Message</h4>
            </div>
            <div class="card-body">
                <p class="fw-bold mb-2">Name:</p>
                <p class="border p-2 rounded bg-white">{{ $full_name }}</p>

                <p class="fw-bold mb-2">Email:</p>
                <p class="border p-2 rounded bg-white">{{ $email }}</p>

                <p class="fw-bold mb-2">Phone Number:</p>
                <p class="border p-2 rounded bg-white">{{ $phone_number }}</p>

                <p class="fw-bold mb-2">Message:</p>
                <div class="border p-3 rounded bg-white" style="white-space: pre-line;">
                    {{ $user_message }}
                </div>
            </div>
            <div class="card-footer text-muted text-end">
                Contact form submission from your website
            </div>
        </div>
    </div>
</body>
</html>