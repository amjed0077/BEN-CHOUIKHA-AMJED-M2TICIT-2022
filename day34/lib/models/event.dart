class Event {
  final int id;
  final String image;
  final String name;
  final String type;
  final DateTime date;
  final String prix;
  final String adresse;
  Event(
    this.id,
    this.image,
    this.name,
    this.type,
    this.date,
    this.prix,
    this.adresse,
  );

  factory Event.fromJson(Map<String, dynamic> json) {
    return new Event(json["id"], json["image"], json["name"], json["type"],
        DateTime.parse(json["date"]), json["prix"].toString(), json["adresse"]);
  }
}
