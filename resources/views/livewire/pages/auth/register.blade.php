<?php

use App\Models\User;
use App\Models\Pelanggan;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $alamat = '';
    public string $telpon = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        DB::beginTransaction();
        try {
            event(new Registered(($user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'role' => 'users'
            ]))));

            Pelanggan::create([
                'nama' => $this->name,
                'alamat' => $this->alamat,
                'email' => $this->email,
                'telp' => $this->telpon,
            ]);

            auth()->login($user);
            DB::commit();
            $this->redirect(RouteServiceProvider::HOME, navigate: true);
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}; ?>


<div class="d-flex justify-content-center mt-4">
    <div class="card card-info" style="width: 30rem">
        <div class="card-header bg-info rounded py-3">
            <h3 class="fw-bold text-white">Register Form</h3>
        </div>
        <div class="card-body">
            <form wire:submit="register">
                <!-- Name -->
                <div class="form-group text-black">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input class="form-control text-black" id="name" name="name" type="text"
                        wire:model="name" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <div class="form-group mt-4 text-black">
                    <x-input-label for="alamat" :value="__('Alamat')" />
                    <textarea class="form-control text-black" type="text" wire:model="alamat"></textarea>
                    <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
                </div>



                <!-- Email Address -->
                <div class="form-group mt-4 text-black">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input class="form-control text-black" id="email" name="email" type="email"
                        wire:model="email" required autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                </div>


                <div class="form-group mt-4 text-black">
                    <x-input-label for="name" :value="__('Telpon')" />
                    <x-text-input class="form-control text-black" id="telpon" name="telpon" type="text"
                        wire:model="telpon" required autofocus autocomplete="telpon" />
                    <x-input-error class="mt-2" :messages="$errors->get('telpon')" />
                </div>

                <!-- Password -->
                <div class="form-group mt-4 text-black">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input class="form-control text-black" id="password" name="password" type="password"
                        wire:model="password" required autocomplete="new-password" />

                    <x-input-error class="mt-2" :messages="$errors->get('password')" />
                </div>

                <!-- Confirm Password -->
                <div class="form-group mt-4 text-black">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input class="form-control text-black" id="password_confirmation"
                        name="password_confirmation" type="password" wire:model="password_confirmation" required
                        autocomplete="new-password" />

                    <x-input-error class="mt-2" :messages="$errors->get('password_confirmation')" />
                </div>

                <div class="form-group mt-4 flex items-center justify-end text-black">


                    <x-primary-button class="btn btn-primary ml-4">
                        {{ __('Register') }}
                    </x-primary-button>
                    {{-- <br> --}}
                    <a class="ml-4 rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                        href="{{ route('login') }}" wire:navigate>
                        {{ __('Already registered?') }}
                    </a>
                </div>
            </form>
        </div>
        <div class="card-footer bg-info">

        </div>
    </div>


</div>
