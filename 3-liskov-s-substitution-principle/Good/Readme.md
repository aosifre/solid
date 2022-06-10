⭐️ Pourquoi utiliser le principe de substitution de Liskov (LSP) ?

- Ça évite les bogues où un enfant fait (surtout) plus qu’un parent (plus de paramètres, de retours, d’exceptions levées…).
- Les mises à jour de code seront plus faciles à organiser (chaque changement du parent induit des changements vers les enfants = sécurité).
- On gagne niveau lisibilité et qualité, le code est beaucoup plus simple à lire et à (ré-)utiliser.