@extends('layouts/app2')

@section('dashboard_title', 'Change Password')

@section('content')

<style>
    .pf-wrap { padding: 4px 0 24px; }

    .pf-card {
        background: #ffffff;
        border: 1px solid #eef0f8;
        border-radius: 24px;
        padding: 28px 32px;
        box-shadow: 0 2px 8px rgba(49,39,131,0.06);
        margin-bottom: 20px;
    }

    .pf-card-head { margin-bottom: 22px; }

    .pf-card-title {
        margin: 0 0 4px;
        font-family: "Manrope", sans-serif;
        font-size: 17px;
        font-weight: 800;
        color: #1a086e;
    }

    .pf-card-copy {
        margin: 0;
        font-size: 13px;
        color: #6b7280;
        line-height: 1.6;
    }

    .pf-field { margin-bottom: 18px; }

    .pf-label {
        display: block;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        color: #474551;
        margin-bottom: 7px;
        margin-left: 2px;
    }

    .pf-input-wrap {
        position: relative;
    }

    .pf-input {
        display: block;
        width: 100%;
        background: #f0f3ff;
        border: none;
        border-radius: 12px;
        padding: 12px 44px 12px 16px;
        font-size: 14px;
        font-weight: 500;
        color: #151c27;
        transition: box-shadow .18s ease, background .18s ease;
        outline: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }

    .pf-input:focus {
        background: #eaedff;
        box-shadow: 0 0 0 3px rgba(75,65,223,0.18);
    }

    .pf-input.is-invalid {
        background: #fff0f0;
        box-shadow: 0 0 0 3px rgba(239,68,68,0.18);
    }

    .pf-eye-btn {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        cursor: pointer;
        padding: 0;
        color: #9ca3af;
        display: flex;
        align-items: center;
        transition: color .15s;
    }

    .pf-eye-btn:hover { color: #4b41df; }
    .pf-eye-btn .material-symbols-outlined { font-size: 20px; }

    .pf-field-hint {
        font-size: 11px;
        color: #9ca3af;
        margin-top: 6px;
        margin-left: 2px;
    }

    .pf-field-error {
        font-size: 12px;
        color: #dc2626;
        font-weight: 600;
        margin-top: 5px;
        margin-left: 2px;
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .pf-strength-bar {
        height: 4px;
        border-radius: 999px;
        background: #e5e7eb;
        margin-top: 8px;
        overflow: hidden;
    }

    .pf-strength-fill {
        height: 100%;
        border-radius: 999px;
        width: 0;
        transition: width .3s ease, background .3s ease;
    }

    .pf-strength-label {
        font-size: 11px;
        font-weight: 700;
        margin-top: 4px;
        margin-left: 2px;
        color: #9ca3af;
        transition: color .3s;
    }

    .pf-requirements {
        background: #f5f7ff;
        border: 1px solid #e2e8f8;
        border-radius: 16px;
        padding: 16px 20px;
        margin-top: 6px;
    }

    .pf-req-title {
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        color: #1a086e;
        margin-bottom: 10px;
    }

    .pf-req-list {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .pf-req-list li {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 12px;
        color: #6b7280;
        font-weight: 600;
        transition: color .2s;
    }

    .pf-req-list li .material-symbols-outlined {
        font-size: 16px;
        color: #d1d5db;
        transition: color .2s;
    }

    .pf-req-list li.ok { color: #15803d; }
    .pf-req-list li.ok .material-symbols-outlined { color: #16a34a; }

    .pf-success-msg {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #edfdf5;
        border: 1px solid #c9f3dc;
        color: #166534;
        border-radius: 12px;
        padding: 13px 18px;
        margin-bottom: 20px;
        font-weight: 600;
        font-size: 14px;
    }

    .pf-error-msg {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        background: #fff5f5;
        border: 1px solid #fecaca;
        color: #991b1b;
        border-radius: 12px;
        padding: 13px 18px;
        margin-bottom: 20px;
        font-weight: 600;
        font-size: 13px;
    }

    .pf-error-msg ul { margin: 4px 0 0; padding-left: 16px; }
    .pf-error-msg li { margin-bottom: 2px; }

    .pf-btn-row {
        display: flex;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
        padding-top: 6px;
    }

    .pf-btn-primary {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 13px 28px;
        background: linear-gradient(135deg, #4b41df, #1a086e);
        color: #fff;
        font-weight: 700;
        font-size: 14px;
        border: none;
        border-radius: 12px;
        cursor: pointer;
        box-shadow: 0 8px 20px rgba(49,39,131,0.22);
        transition: transform .15s, box-shadow .2s;
        text-decoration: none;
    }

    .pf-btn-primary:hover { transform: translateY(-1px); box-shadow: 0 12px 24px rgba(49,39,131,0.28); color: #fff; }

    .pf-btn-secondary {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 11px 20px;
        background: #fff;
        color: #1a086e;
        font-weight: 700;
        font-size: 13px;
        border: 1px solid #dce2f3;
        border-radius: 12px;
        cursor: pointer;
        text-decoration: none;
        transition: background .15s;
    }

    .pf-btn-secondary:hover { background: #f3f6ff; color: #1a086e; text-decoration: none; }

    @media (max-width: 767.98px) {
        .pf-card { padding: 18px 16px; border-radius: 18px; }
        .pf-btn-primary, .pf-btn-secondary { width: 100%; justify-content: center; }
    }
</style>

<div class="pf-wrap">

    @if(session('success'))
        <div class="pf-success-msg">
            <span class="material-symbols-outlined">check_circle</span>
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="pf-error-msg">
            <span class="material-symbols-outlined" style="font-size:20px;flex-shrink:0;">error</span>
            <div>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <form id="cp-form" method="POST" action="{{ route('web.profile.update_password') }}" novalidate>
        @csrf

        {{-- Current password --}}
        <div class="pf-card">
            <div class="pf-card-head">
                <h3 class="pf-card-title">Change Password</h3>
                <p class="pf-card-copy">Keep your account secure by choosing a strong, unique password.</p>
            </div>

            <div class="pf-field">
                <label class="pf-label" for="current_password">Current Password</label>
                <div class="pf-input-wrap">
                    <input class="pf-input @error('current_password') is-invalid @enderror"
                        type="password" id="current_password" name="current_password"
                        placeholder="Enter your current password" autocomplete="current-password">
                    <button type="button" class="pf-eye-btn" data-target="current_password" tabindex="-1">
                        <span class="material-symbols-outlined">visibility</span>
                    </button>
                </div>
                @error('current_password')
                    <p class="pf-field-error"><span class="material-symbols-outlined">error</span>{{ $message }}</p>
                @enderror
            </div>

            <div class="pf-field">
                <label class="pf-label" for="new_password">New Password</label>
                <div class="pf-input-wrap">
                    <input class="pf-input @error('new_password') is-invalid @enderror"
                        type="password" id="new_password" name="new_password"
                        placeholder="Enter new password" autocomplete="new-password">
                    <button type="button" class="pf-eye-btn" data-target="new_password" tabindex="-1">
                        <span class="material-symbols-outlined">visibility</span>
                    </button>
                </div>
                <div class="pf-strength-bar"><div class="pf-strength-fill" id="strengthFill"></div></div>
                <p class="pf-strength-label" id="strengthLabel">Strength</p>
                @error('new_password')
                    <p class="pf-field-error"><span class="material-symbols-outlined">error</span>{{ $message }}</p>
                @enderror
            </div>

            <div class="pf-field">
                <label class="pf-label" for="new_password_confirmation">Confirm New Password</label>
                <div class="pf-input-wrap">
                    <input class="pf-input"
                        type="password" id="new_password_confirmation" name="new_password_confirmation"
                        placeholder="Repeat your new password" autocomplete="new-password">
                    <button type="button" class="pf-eye-btn" data-target="new_password_confirmation" tabindex="-1">
                        <span class="material-symbols-outlined">visibility</span>
                    </button>
                </div>
                <p class="pf-field-error" id="matchError" style="display:none;">
                    <span class="material-symbols-outlined">error</span>Passwords do not match.
                </p>
            </div>
        </div>

        {{-- Requirements box --}}
        <div class="pf-card">
            <div class="pf-requirements">
                <p class="pf-req-title">Password Requirements</p>
                <ul class="pf-req-list">
                    <li id="req-len"><span class="material-symbols-outlined">check_circle</span>At least 8 characters</li>
                    <li id="req-letter"><span class="material-symbols-outlined">check_circle</span>Contains letters (a–z)</li>
                    <li id="req-number"><span class="material-symbols-outlined">check_circle</span>Contains numbers (0–9)</li>
                    <li id="req-match"><span class="material-symbols-outlined">check_circle</span>Passwords match</li>
                </ul>
            </div>
        </div>

        {{-- Actions --}}
        <div class="pf-card">
            <div class="pf-btn-row">
                <button type="submit" class="pf-btn-primary" id="cp-submit">
                    <span class="material-symbols-outlined" style="font-size:18px;">lock_reset</span>
                    Update Password
                </button>
                <a href="{{ route('web.profile.edit') }}" class="pf-btn-secondary">
                    <span class="material-symbols-outlined" style="font-size:18px;">arrow_back</span>
                    Cancel
                </a>
            </div>
        </div>

    </form>
</div>

@endsection

@section('js')
<script>
(function () {

    // Toggle eye buttons
    document.querySelectorAll('.pf-eye-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var input = document.getElementById(btn.dataset.target);
            var icon  = btn.querySelector('.material-symbols-outlined');
            if (input.type === 'password') {
                input.type = 'text';
                icon.textContent = 'visibility_off';
            } else {
                input.type = 'password';
                icon.textContent = 'visibility';
            }
        });
    });

    var newPwd    = document.getElementById('new_password');
    var confirmPwd= document.getElementById('new_password_confirmation');
    var fill      = document.getElementById('strengthFill');
    var lbl       = document.getElementById('strengthLabel');
    var matchErr  = document.getElementById('matchError');

    var reqs = {
        len:    document.getElementById('req-len'),
        letter: document.getElementById('req-letter'),
        number: document.getElementById('req-number'),
        match:  document.getElementById('req-match')
    };

    function setReq(el, ok) {
        el.classList.toggle('ok', ok);
        el.querySelector('.material-symbols-outlined').textContent = ok ? 'check_circle' : 'check_circle';
    }

    function evalStrength(val) {
        var score = 0;
        if (val.length >= 8)               score++;
        if (/[a-zA-Z]/.test(val))          score++;
        if (/[0-9]/.test(val))             score++;
        if (/[^a-zA-Z0-9]/.test(val))      score++;
        if (val.length >= 12)              score++;

        var pct, color, text;
        if (score <= 1)      { pct = 20;  color = '#ef4444'; text = 'Very weak'; }
        else if (score == 2) { pct = 40;  color = '#f97316'; text = 'Weak'; }
        else if (score == 3) { pct = 65;  color = '#eab308'; text = 'Fair'; }
        else if (score == 4) { pct = 85;  color = '#22c55e'; text = 'Strong'; }
        else                 { pct = 100; color = '#16a34a'; text = 'Very strong'; }

        fill.style.width     = pct + '%';
        fill.style.background = color;
        lbl.textContent      = text;
        lbl.style.color      = color;
    }

    function checkMatch() {
        var ok = newPwd.value && newPwd.value === confirmPwd.value;
        setReq(reqs.match, ok);
        matchErr.style.display = (confirmPwd.value && !ok) ? 'flex' : 'none';
        return ok;
    }

    newPwd.addEventListener('input', function() {
        var v = newPwd.value;
        setReq(reqs.len,    v.length >= 8);
        setReq(reqs.letter, /[a-zA-Z]/.test(v));
        setReq(reqs.number, /[0-9]/.test(v));
        evalStrength(v);
        if (confirmPwd.value) checkMatch();
    });

    confirmPwd.addEventListener('input', checkMatch);

    // Client-side validation before submit
    document.getElementById('cp-form').addEventListener('submit', function(e) {
        var valid = true;

        if (!document.getElementById('current_password').value.trim()) {
            document.getElementById('current_password').classList.add('is-invalid');
            valid = false;
        }

        var v = newPwd.value;
        if (!v || v.length < 8 || !/[a-zA-Z]/.test(v) || !/[0-9]/.test(v)) {
            newPwd.classList.add('is-invalid');
            valid = false;
        }

        if (!checkMatch()) valid = false;

        if (!valid) e.preventDefault();
    });

    // Remove invalid class on typing
    ['current_password','new_password','new_password_confirmation'].forEach(function(id) {
        document.getElementById(id).addEventListener('input', function() {
            this.classList.remove('is-invalid');
        });
    });

})();
</script>
@endsection