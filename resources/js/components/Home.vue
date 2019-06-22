<template>
    <div>
      <div class="jumbotron">
        <div class="container">

          <h1 class="display-4">Search Hotels</h1>
          <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
          <hr class="my-4">

          <form>
            <div class="form-row align-items-center">
              <div class="col-sm-3 my-1">
                <label class="sr-only" for="inlineFormInputName">Start Date</label>
                <input type="text" class="form-control" id="inlineFormInputName" placeholder="Jane Doe">
              </div>
              <div class="col-sm-3 my-1">
                <label class="sr-only" for="inlineFormInputGroupUsername">End Date</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">@</div>
                  </div>
                  <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Username">
                </div>
              </div>
              <div class="col-auto my-1">
                <button type="submit" class="btn btn-danger">Search</button>
              </div>
            </div>
          </form>

        </div>
      </div>

    </div>
</template>