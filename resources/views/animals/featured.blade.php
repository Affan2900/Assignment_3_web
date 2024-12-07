<div class="featured-animals">
  @foreach($featuredAnimals as $animal)
      <div class="featured-animal card mb-3">
          <div class="card-body">
              <h3>{{ $animal->name }}</h3>
              <p>{{ $animal->description }}</p>
          </div>
      </div>
  @endforeach
</div>
