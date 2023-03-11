<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <livewire:styles />
    <style>.outgoing_msg {
        margin-left: auto;
    }

    .incoming_msg {
        margin-right: auto;
    }

    .msg_history {
        overflow-y: auto;
        padding: 10px;
    }
    </style>
</head>
<body>
    <header>
        <!-- Add header content here -->
    </header>

    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header">
                            Chat System
                        </div>
                        <livewire:chat :receiver="$receiver"/>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <!-- Add footer content here -->
    </footer>

    <livewire:scripts />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
