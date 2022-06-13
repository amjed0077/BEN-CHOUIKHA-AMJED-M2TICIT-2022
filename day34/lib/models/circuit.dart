class Circuit {
  final int id;
  final String image;
  final String name;
  final String prix;
  final String description;
  final String nbjours;
  final DateTime date;
  Circuit(this.id, this.image, this.name, this.prix, this.description,
      this.nbjours, this.date);

  factory Circuit.fromJson(Map<String, dynamic> json) {
    return new Circuit(
        json["id"],
        json["image"],
        json["name"],
        json["prix"].toString(),
        json["description"],
        json["nbjours"],
        DateTime.parse(json["date"]));
  }
}
