@extends('layouts.default')
@section('page-title', 'Editar usuário')

@section('content')
    @session('success')
    <div class="alert alert-success">
        {{ $value }}
    </div>
    @endsession

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input
                type="text"
                name="name"
                value="{{ old('name') ?? $user->name }}"
                class="form-control @error('name') is-invalid @enderror"
                id="name"
            >
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input
                type="email"
                name="email"
                value="{{ old('email') ?? $user->email}}"
                class="form-control @error('email') is-invalid @enderror"
                id="email">
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input
                type="password"
                name="password"
                class="form-control @error('password') is-invalid @enderror"
                id="password">
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
@endsection
