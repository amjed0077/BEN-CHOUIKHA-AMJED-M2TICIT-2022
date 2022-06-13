class Hotel {
  final int id;
  final String image;
  final String name;
  final String description;
  final String nbetoils;
  final String adresse;
  final String prix;

  Hotel(
    this.id,
    this.image,
    this.name,
    this.description,
    this.nbetoils,
    this.adresse,
    this.prix,
  );

  factory Hotel.fromJson(Map<String, dynamic> json) {
    return new Hotel(
        json["id"],
        json["image"],
        json["name"],
        json["description"],
        json["nbetoils"],
        json["adresse"],
        json["prix"].toString());
  }
}
