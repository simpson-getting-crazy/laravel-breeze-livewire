<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
            <div class="p-6 text-gray-900">
                <x-stats-card title="Total Users" value="{{ $countUsers }}">
                    <x-heroicon-s-user-group class="w-6 h-6 text-red-500" />
                </x-stats-card>
            </div>
            <div class="p-6 text-gray-900">
                <x-stats-card title="Total Posts" value="{{ $countPosts }}">
                    <x-heroicon-o-newspaper class="w-6 h-6 text-red-500" />
                </x-stats-card>
            </div>
            <div class="p-6 text-gray-900">
                <x-stats-card title="Total Available Routes" value="{{ $countTotalRoutes }}">
                    <x-heroicon-s-arrow-path-rounded-square class="w-6 h-6 text-red-500" />
                </x-stats-card>
            </div>
            <div class="p-6 text-gray-900">
                <x-stats-card title="Total Available Migration" value="{{ $countTotalMigrations }}">
                    <x-heroicon-c-circle-stack class="w-6 h-6 text-red-500" />
                </x-stats-card>
            </div>
            <div class="bg-white rounded-lg shadow-md border border-gray-100 transition-all duration-200 hover:shadow-lg col-span-12 mx-5 min-h-24">
                <div id="chart"></div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            const data = JSON.parse('{!! json_encode($yearlyVisitorCharts) !!}');
            console.log(data)
            var options = {
                chart: {
                    type: 'line',
                    height: '300px'
                },
                series: [{
                    name: 'visitor counter',
                    data: data.map(item => item.count)
                }],
                xaxis: {
                    categories: data.map(item => `${item.year}-${item.month}`)
                }
            }

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        </script>
    @endpush
</x-app-layout>
