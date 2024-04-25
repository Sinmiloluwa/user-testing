@extends('layouts.app')

@section('content')
<div class="flex h-screen bg-slate-900">
   @include('layouts.dashboard-nav')
  <div class="flex flex-col flex-1">
   @include('layouts.dashboard-header')
    <main class="flex flex-col flex-1 mt-4 ml-64">
      <div class="flex flex-row justify-between px-16 pt-12">
          <div class="reports">
              <h3 class="text-xl font-bold text-black">Project Reports</h3>
          </div>
          <div class="filter justify-end">
              <button type="button" class="flex items-center px-3 rounded-md  focus:outline-gray-500 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  <span class="mr-1">Filter</span>
                  <span class="ml-2"><img src="{{ asset('regular-icon.png') }}" alt=""></span>
              </button>
          </div>
      </div>

      <div class="py-6">
        <div>
          <canvas class="flex w-full h-50" id="myChart" height="500"></canvas>
        </div>
      </div>

      
<div class="relative overflow-x-auto shadow-md sm:rounded-lg px-8">
  <div class="py-3 border border-gray-400 px-3 rounded-md border-t-1 border-l-1 border-r-1 border-b-0">
    List of Projects
  </div>
  <div class="pb-4 bg-white dark:bg-gray-900 flex justify-between">
    <label for="table-search" class="sr-only">Search</label>
    <div class="relative mt-1">
      <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
        </svg>
      </div>
      <input type="text" id="table-search" class="block pt-3 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
    </div>
      <div class="actions">
        <a href="{{route('project.submit')}}" id="openModal" class="bg-black text-white p-3 text-sm rounded-md mr-2 font-light">Add New Project</a>
      </div>
  </div>
  <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
              <th scope="col" class="p-4">
                  <div class="flex items-center">
                      <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                      <label for="checkbox-all-search" class="sr-only">checkbox</label>
                  </div>
              </th>
              <th scope="col" class="px-6 py-3">
                  Project Name
              </th>
              <th scope="col" class="px-6 py-3">
                  Expires in 
              </th>
              <th scope="col" class="px-6 py-3">
                  Status
              </th>
              <th scope="col" class="px-6 py-3">
                Action
            </th>
          </tr>
      </thead>
      <tbody>
          @php
            $projects = App\Models\Project::paginate(10);
          @endphp
          @foreach($projects as $project)
          <tr class="bg-white dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <td class="w-4 p-4">
                <div class="flex items-center">
                    <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                </div>
            </td>
            <td class="px-6 py-4">
              {{$project->project_name}}
            </td>
            <td class="px-6 py-4">
              @php
                  $expiryDate = \Carbon\Carbon::parse($project->expiry_date);
                  $differenceInDays = ceil(\Carbon\Carbon::now()->diffInDays($expiryDate));
                  $status = 1;
                  if (\Carbon\Carbon::now() > $expiryDate) {
                    $status = 0;
                    echo 'Expired';
                  }
                  elseif ($differenceInDays > 0) {
                      echo $differenceInDays . ' days';
                  } elseif ($differenceInDays < 0) {
                      echo abs($differenceInDays) . ' days ago';
                  } else {
                      echo 'Today';
                  }
              @endphp
          </td>
            <td class="px-4 py-2 bg-green text-green-500">
              <span class="px-2 rounded-2xl {{ $status ? 'text-green-400 bg-green-100' : 'bg-red-100 text-red-500' }}">
                  {{ $status ? 'Active' : 'Inactive' }}
              </span>
          </td>
          <td class="px-4 py-2 flex flex-row">
            <div>
                <a href="{{ route('project.view', $project->id)}}" class="mr-2">View</a>
            </div>
            <div class="divider"></div>
            <div>
                <form action="{{ route('project.delete') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{$project->id}}" name="project_id">
                    <button type="submit" class="text-red-400">Delete</button>
                </form>
            </div>
        </td>
        

        </tr>
          @endforeach
      </tbody>
  </table>
</div>
<div class="flex justify-center items-center py-6">
  <nav aria-label="Page navigation example">
    {{ $projects->links() }}
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
  </form>
  </nav>
</div>


      {{-- <div class="py-8">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
          <h2 class="text-lg font-bold text-black-500 tracking-wider border-b border-black-200 mb-2 pb-2">List of projects</h2>
          <table class="min-w-full divide-y divide-gray-200 px-8">
            <thead class="bg-gray-50 border-b border-black-500">
              <tr class="flex justify-between">
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  <span></span> <!-- Placeholder for Add New Project button -->
                  <span class="flex items-center">
                    <button class="mr-4">Add New Project</button> <!-- Button for Add New Project -->
                    <button>Delete</button> <!-- Button for Delete -->
                  </span>
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <tr>
                <td class="px-6 py-4 whitespace-nowrap">John Doe</td>
                <td class="px-6 py-4 whitespace-nowrap">john@example.com</td>
                <td class="px-6 py-4 whitespace-nowrap">Admin</td>
              </tr>
              <tr>
                <td class="px-6 py-4 whitespace-nowrap">Jane Smith</td>
                <td class="px-6 py-4 whitespace-nowrap">jane@example.com</td>
                <td class="px-6 py-4 whitespace-nowrap">User</td>
              </tr>
              <!-- More rows here -->
            </tbody>
          </table>
        </div>
      </div> --}}
      @php
    $dataJson = $projects;
@endphp
      
  </main>
  
  </div>
  </div>
  @php
  $months = [];
  $values = [];
  $projects = DB::table('projects')
  ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('COUNT(*) as project_count'))
  ->where('user_id', auth()->id())
  ->groupBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'))
  ->orderBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'))
  ->get();

  foreach ($projects as $project) {
      $months[] = \Carbon\Carbon::createFromFormat('Y-m', $project->month)->format('F');
      $values[] = $project->project_count;
  }

  // dd(\Carbon\Carbon::createFromFormat('Y-m', '2024-04')->format('F'));
  @endphp

  <script>
    const ctx = document.getElementById('myChart');
    const months = @json($months);
    const values = @json($values);

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: months,
        datasets: [{
          data: values,
          borderWidth: 0.1,
          backgroundColor: '#030602',
          barThickness: 7
        }]
      },
      options: {
        plugins: {
          legend: {
            display: false  // Hide the legend
          }
        },
        scales: {
          y: {
            beginAtZero: true
          },
          x: {
           grid: {
            display: false // Remove vertical gridlines
          }
        }
        },
        layout: {
          padding: {
            left: 30, // Padding on the left side
            right: 30 // Padding on the right side
          }
        }
      }
    });
  </script>

<script>
  // Get the modal
  const modal = document.getElementById('myModal');
  const modalOverlay = document.getElementById('modalOverlay');

  // Get the button that opens the modal
  const btn = document.getElementById('openModal');

  // Get the <span> element that closes the modal
  const span = document.getElementById('closeModal');

  // When the user clicks on the button, open the modal
  btn.onclick = function() {
    modal.classList.remove('hidden');
    modal.classList.add('fixed');
    modalOverlay.classList.remove('hidden');
  }

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.classList.add('hidden');
    modal.classList.remove('fixed');
    modalOverlay.classList.add('hidden');
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.classList.add('hidden');
      modal.classList.remove('fixed');
      modalOverlay.classList.add('hidden');
    }
  }
</script>

@endsection