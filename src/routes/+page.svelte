<link rel="stylesheet" href="/Style/home.css">

<main>
  <div id="carouselExampleControlsNoTouching" class="carousel slide banner" data-bs-touch="false" data-bs-interval="false">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="mainphoto2.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="mainpic3.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="mainpic.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <section class="container my-5">
    <div class="row">
      <div class="col-md-12">
        <article>
          <h2 style="font-size:35px; font-weight:400; " class="p-2" >Welcome to TacGear - Your Ultimate Destination for Tactical Pouches and Bags!</h2>
          <p>At TacGear, we specialize in providing top-of-the-line tactical pouches and bags for all your carrying needs. We understand the importance of reliable gear that can withstand the demands of your adventurous lifestyle.</p>
          <p>Our collection focuses on quality and functionality, offering a carefully curated selection of pouches and bags designed to keep your essentials organized and easily accessible. Whether you're an outdoor enthusiast, a military professional, or someone who values preparedness, our products are crafted to meet your specific requirements.</p>
          <p>From compact pouches for storing small items to spacious bags capable of carrying all your gear, we have a variety of options to suit your needs. Each item in our collection is made from durable materials and features smart designs to ensure long-lasting performance in any situation.</p>
          <p>At TacGear, we believe in the power of simplicity. By specializing in pouches and bags, we ensure that our expertise and attention are focused on providing you with the best carrying solutions. Our dedication to quality craftsmanship and customer satisfaction sets us apart.</p>
          <p>Browse our range of tactical pouches and bags today and experience the difference TacGear brings to your adventures. Gear up with confidence and rely on TacGear as your go-to source for premium tactical gear.</p>
        </article>
      </div>
    </div>
  </section>

  <div class="container mb-5">
    <article class="justify-content-center text-center">
      <h2 style="font-size:35px; font-weight:400; " >Fact of the day</h2>
      <p>{historicalFact}</p>
    </article>
    
  </div>
</main>

<script>
   let historicalFact = '';

async function fetchHistoricalFact() {
  try {
    const response = await fetch('https://api.api-ninjas.com/v1/historicalevents?text=world war', {
      headers: { 'X-Api-Key': 'ayn3Jv4chSPCseFK8Etk7w==05vQpUc5K5l45Slj' }
    });

    if (response.ok) {
      const data = await response.json();
      const randomIndex = Math.floor(Math.random() * data.length);
      historicalFact = data[randomIndex].event;
    } else {
      console.error('Error:', response.statusText);
    }
  } catch (error) {
    console.error('Error:', error.message);
  }
}

fetchHistoricalFact();
</script>
