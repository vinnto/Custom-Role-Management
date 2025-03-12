<style>
    .alert {
        margin-button: 20px;
        padding: 10px;
        border: 1px solid transparent;
        border-radius: 4px;
    }

    .success {
        color: #155724;
        text-align: center;
        background-color: #d4edda;
        border-color: #c3e6cb;
    }

    .danger {
        color: #721c24;
        text-align: center;
        background-color: #f8d7da;
        border-color: #f5c6cb;
    }
</style>

@if (!empty(session('success')))
    <div class="alert success" role="alert">
        {{ session('success') }}
    </div>
@endif

@if (!empty(session('error')))
    <div class="alert danger" role="alert">
        {{ session('error') }}
    </div>
@endif
