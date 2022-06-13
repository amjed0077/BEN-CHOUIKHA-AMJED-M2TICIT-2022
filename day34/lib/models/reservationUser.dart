class reservations_User {
  String created_at;
  String labelle_Service;
  String etat;

  reservations_User(
      {required this.created_at,
      required this.labelle_Service,
      required this.etat});
  factory reservations_User.fromJson(Map<String, dynamic> fichierJson) {
    return new reservations_User(
      created_at: fichierJson['created_at'] ?? "",
      labelle_Service: fichierJson['labelle_Service'] ?? "",
      etat: fichierJson['etat'] ?? "",
    );
  }
}
