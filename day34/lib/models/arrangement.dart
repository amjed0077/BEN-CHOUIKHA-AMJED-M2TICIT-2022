class Arranegement {
  final String arrangement_labelle;
  final String prix;

  Arranegement(this.arrangement_labelle, this.prix);

  factory Arranegement.fromJson(Map<String, dynamic> json) {
    return new Arranegement(
      json["arrangement_labelle"],
      json["prix"],
    );
  }
}
