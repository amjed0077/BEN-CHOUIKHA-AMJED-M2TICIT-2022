class User {
  int id;
  String name;
  String email;
  User({required this.id, required this.name, required this.email});
  factory User.fromJson(Map<String, dynamic> fichierJson) {
    return new User(
      id: fichierJson['id'] as int,
      name: fichierJson['name'] ?? "",
      email: fichierJson['email'] ?? "",
    );
  }
}
