<div class="card">
   <div class="card-header bg-light">
      <div class="row align-items-center">
         <div class="col">
            <h5 class="mb-0" id="Users">Users <span class="d-none d-sm-inline-block">({{$people->count()}})</span></h5>
         </div>
         <div class="col">
            <form>
               <div class="row g-0">
                  <div class="col">
                     <input class="form-control form-control-sm" type="text" wire:model="search" placeholder="Search..." />
                  </div>

               </div>
            </form>
         </div>

      </div>
   </div>
   <div class="card-body bg-light px-1 py-0">
      <div class="row g-0 text-center fs--1">
         <!-- $people->links() -->
         @foreach($people as $person)
         <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
            <div class="bg-white dark__bg-1100 p-3 h-100"><a href="tel:{{$person->phone}}"><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="../../assets/img/team/avatar.png" alt="" width="100" /></a>
               <h6 class="mb-1"><a href="tel:{{$person->phone}}">{{$person->name}}</a>
               </h6>
               <p class="fs--2 mb-1"><a class="text-700" href="#!">SMS Acquisition</a></p>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</div>

