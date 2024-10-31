<x-filament::page>
    <form wire:submit.prevent="submit">
        {{ $this->form }}
        <x-filament::button type="submit" color="primary" class="mt-4">Update Profile</x-filament::button>
    </form>
</x-filament::page>