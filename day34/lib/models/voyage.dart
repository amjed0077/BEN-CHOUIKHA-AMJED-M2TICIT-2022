class Voyage {
  final int id;
  final String destination;
  final String description;
  final String image;
  final String prix;
  final String nbjours;
  final DateTime date;
  final String hotel;

  Voyage(
    this.id,
    this.image,
    this.destination,
    this.nbjours,
    this.description,
    this.date,
    this.prix,
    this.hotel,
  );

  factory Voyage.fromJson(Map<String, dynamic> json) {
    return new Voyage(
        json["id"],
        json["image"],
        json["destination"],
        json["nbjours"],
        json["description"],
        DateTime.parse(json["date"]),
        json["prix"].toString(),
        json["hotel"]);
  }
}
