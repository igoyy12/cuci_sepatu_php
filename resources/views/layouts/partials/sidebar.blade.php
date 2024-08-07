<x-maz-sidebar :href="route('dashboard')" logo='SepatuKu'>
    <!-- Add Sidebar Menu Items Here -->

    <x-maz-sidebar-item name="Dashboard" :link="route('dashboard')" icon="bi bi-grid-fill"></x-maz-sidebar-item>
    <x-maz-sidebar-item icon="bi bi-card-list" :link="route('booking')" name="Booking"></x-maz-sidebar-item>
    <x-maz-sidebar-item icon="bi bi-tools" :link="route('mechanics')" name="Cleaners"></x-maz-sidebar-item>
    @isRole('owner')
    <x-maz-sidebar-item icon="bi bi-people-fill" :link="route('users')" name="Users"></x-maz-sidebar-item>
    <x-maz-sidebar-item icon="bi bi-file-bar-graph-fill" :link="route('report')" name="Report"></x-maz-sidebar-item>
    @endisRole
    

    {{-- <x-maz-sidebar-item name="Component" icon="bi bi-stack">
        <x-maz-sidebar-sub-item name="Accordion" :link="route('components.accordion')"></x-maz-sidebar-sub-item>
        <x-maz-sidebar-sub-item name="Alert" :link="route('components.alert')"></x-maz-sidebar-sub-item>
    </x-maz-sidebar-item> --}}

</x-maz-sidebar>