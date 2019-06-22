<template>
    <div>
        <div>
            <b-jumbotron>
                <b-container>
                    
                    <h2>Search Hotels</h2>
                    <hr class="my-4">
                    <b-form  @submit="onSubmit" @reset="onReset" inline>
                        <label class="" for="inline-form-input-name">Start Date</label>
                        <b-input
                        id="inline-form-input-name"
                        class="mb-2 mr-sm-2 mb-sm-0"
                        placeholder="Start Date"
                        ></b-input>

                        <label class="" for="inline-form-input-username">End Date</label>
                        <b-input id="inline-form-input-username" placeholder="Username"></b-input>

                        <b-button variant="primary">Search</b-button>
                    </b-form>
               
                </b-container>
            </b-jumbotron>
        </div>

        <b-container>
            <b-row>
                <b-col>
  <b-card
    title="Card Title"
    img-src="https://picsum.photos/600/300/?image=25"
    img-alt="Image"
    img-top
    tag="article"
    style="max-width: 20rem;"
    class="mb-2"
  >
    <b-card-text>
      Some quick example text to build on the card title and make up the bulk of the card's content.
    </b-card-text>

    <b-button href="#" variant="primary">Go somewhere</b-button>
  </b-card>
</b-col>

<b-col>
  <b-card
    title="Card Title"
    img-src="https://picsum.photos/600/300/?image=25"
    img-alt="Image"
    img-top
    tag="article"
    style="max-width: 20rem;"
    class="mb-2"
  >
    <b-card-text>
      Some quick example text to build on the card title and make up the bulk of the card's content.
    </b-card-text>

    <b-button href="#" variant="primary">Go somewhere</b-button>
  </b-card>
</b-col>

<b-col>
  <b-card
    title="Card Title"
    img-src="https://picsum.photos/600/300/?image=25"
    img-alt="Image"
    img-top
    tag="article"
    style="max-width: 20rem;"
    class="mb-2"
  >
    <b-card-text>
      Some quick example text to build on the card title and make up the bulk of the card's content.
    </b-card-text>

    <b-button href="#" variant="primary">Go somewhere</b-button>
  </b-card>
</b-col>

<b-col>
  <b-card
    title="Card Title"
    img-src="https://picsum.photos/600/300/?image=25"
    img-alt="Image"
    img-top
    tag="article"
    style="max-width: 20rem;"
    class="mb-2"
  >
    <b-card-text>
      Some quick example text to build on the card title and make up the bulk of the card's content.
    </b-card-text>

    <b-button href="#" variant="primary">Go somewhere</b-button>
  </b-card>
</b-col>
            </b-row>        
        </b-container> 
        
    </div>
</template>