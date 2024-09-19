<x-app-layout :PageTitle="'Dashboard'">

    <div class="col-lg-3 col-sm-6 col-12 d-flex">
        <div class="dash-count">
            <div class="dash-counts">
                <h4>{{ $users }}</h4>
                <h5>Users</h5>
            </div>
            <div class="dash-imgs">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-user">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-sm-6 col-12 d-flex">
        <div class="dash-count das2">
            <div class="dash-counts">
                <h4>{{ $categories }}</h4>
                <h5>Category</h5>
            </div>
            <div class="dash-imgs">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="#ffffff"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M15.5 5C15.5073 4.94776 15.5073 4.89475 15.5 4.8425V4.7825C15.4871 4.74064 15.4695 4.70038 15.4475 4.6625C15.4378 4.6409 15.4251 4.62072 15.41 4.6025L15.335 4.505L15.275 4.46L15.185 4.3925L8.435 0.642504C8.32099 0.576677 8.19165 0.542023 8.06 0.542023C7.92835 0.542023 7.79901 0.576677 7.685 0.642504L0.935 4.3925L0.8675 4.445L0.785 4.505C0.763211 4.52953 0.745487 4.55738 0.7325 4.5875C0.708504 4.60903 0.688231 4.63437 0.6725 4.6625C0.653026 4.69541 0.6379 4.73071 0.6275 4.7675C0.623304 4.79233 0.623304 4.81768 0.6275 4.8425C0.575934 4.88697 0.532752 4.94031 0.5 5V11C0.500973 11.1336 0.537641 11.2646 0.606209 11.3793C0.674776 11.494 0.772752 11.5884 0.89 11.6525L7.64 15.4025C7.67099 15.4206 7.70364 15.4356 7.7375 15.4475H7.8125C7.93571 15.4774 8.06429 15.4774 8.1875 15.4475H8.2625L8.3675 15.4025L15.1175 11.6525C15.2333 11.5874 15.3298 11.4927 15.397 11.378C15.4642 11.2634 15.4998 11.1329 15.5 11V5ZM8 7.9025L2.795 5L4.865 3.86L9.9875 6.785L8 7.9025ZM8 2.1125L13.205 5L11.525 5.9375L6.4025 3.005L8 2.1125ZM2 6.275L7.25 9.215V13.475L2 10.5575V6.275ZM8.75 13.475V9.215L11 7.955V10.25L12.5 9.5V7.115L14 6.2825V10.5575L8.75 13.475Z" />
                </svg>

            </div>
        </div>
    </div>

    <div class="col-lg-3 col-sm-6 col-12 d-flex">
        <div class="dash-count das1">
            <div class="dash-counts">
                <h4>{{ $authors }}</h4>
                <h5>Authors</h5>
            </div>
            <div class="dash-imgs">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-user-check">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="8.5" cy="7" r="4"></circle>
                    <polyline points="17 11 19 13 23 9"></polyline>
                </svg>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-sm-6 col-12 d-flex">
        <div class="dash-count das4">
            <div class="dash-counts">
                <h4>{{ $racks }}</h4>
                <h5>Racks</h5>
            </div>
            <div class="dash-imgs">

                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor"
                    class="bi bi-hdd-rack" viewBox="0 0 16 16">
                    <path
                        d="M4.5 5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1M3 4.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m2 7a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m-2.5.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"
                        fill="#ffffffff" />
                    <path
                        d="M2 2a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h1v2H2a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1a2 2 0 0 0-2-2h-1V7h1a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zm13 2v1a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1m0 7v1a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1m-3-4v2H4V7z"
                        fill="#ffffffff" />
                </svg>

            </div>
        </div>
    </div>

    <div class="col-lg-3 col-sm-6 col-12 d-flex">
        <div class="dash-count das3">
            <div class="dash-counts">
                <h4>{{ $books }}</h4>
                <h5>Books</h5>
            </div>
            <div class="dash-imgs">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" class="bi bi-book"
                    viewBox="0 0 16 16">
                    <path
                        d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
                </svg>

            </div>
        </div>
    </div>



</x-app-layout>
