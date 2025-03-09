@extends('layouts.app')
@section('title', 'KYC')
@section('content')
    <style>
        header { background-color: var(--darker); padding: 20px 40px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3); position: sticky; top: 0; z-index: 100; }
        .logo { font-size: 28px; font-weight: 700; color: var(--light); }
        .logo span { color: var(--primary); }
        .auth-buttons { display: flex; gap: 15px; }
        .container { max-width: 480px; margin: 40px auto; padding: 0 20px; }
        h2 { font-size: 28px; font-weight: 700; margin-bottom: 25px; text-align: center; }
        form { background-color: var(--darker); border-radius: 12px; padding: 30px; box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2); }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; font-weight: 500; color: rgba(255, 255, 255, 0.9); }
        .file-upload { border: 2px dashed rgba(255, 255, 255, 0.2); border-radius: 8px; padding: 30px; text-align: center; cursor: pointer; transition: all 0.3s ease; }
        .file-upload:hover { border-color: var(--primary); background-color: rgba(30, 136, 229, 0.05); }
        .file-upload i { font-size: 36px; color: var(--primary); margin-bottom: 15px; }
        .file-upload p { font-size: 16px; margin-bottom: 5px; }
        .file-upload .hint { font-size: 12px; color: rgba(255, 255, 255, 0.6); }
        input[type="file"] { display: none; }
        .form-footer { text-align: center; }
        .form-footer .btn { width: 100%; padding: 14px; font-size: 16px; }
        .warning-message { background-color: rgba(255, 179, 0, 0.1); border-left: 4px solid var(--accent); padding: 15px; margin-bottom: 20px; border-radius: 8px; font-size: 16px; }
    </style>
    <header>
        <a href="{{ route('landing') }}" class="logo">Fake <span>Casino</span></a>
        <div class="auth-buttons">
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-outline">Logout</button>
            </form>
        </div>
    </header>
    <div class="container">
        <h2>KYC Verification</h2>
        @if (session('kyc_message'))
            <div class="warning-message">{{ session('kyc_message') }}</div>
        @endif
        <form method="POST" action="{{ route('kyc.post') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Upload ID Document</label>
                <div class="file-upload" id="file-upload">
                    <i class="fas fa-cloud-upload-alt"></i>
                    <p id="file-name">Click to upload</p>
                    <p class="hint">Accepted: JPG, PNG, PDF (Max 2MB)</p>
                    <input type="file" id="document" name="document" accept=".jpg,.png,.pdf" required>
                </div>
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <script>
        const fileUpload = document.getElementById('file-upload');
        const fileInput = document.getElementById('document');
        fileUpload.addEventListener('click', () => fileInput.click());
        fileInput.addEventListener('change', () => {
            document.getElementById('file-name').textContent = fileInput.files[0].name;
        });
    </script>
@endsection