using System.ComponentModel.DataAnnotations;

namespace Foerderverein_webseite
{
    public class FlohmarktAnmeldedatenBase
    {
        [Key] // Dies stellt sicher, dass Id der Primärschlüssel ist
        public int Id { get; set; }

        [Required(ErrorMessage = "Vorname ist erforderlich")]
        public string Vorname { get; set; } = string.Empty;

        [Required(ErrorMessage = "Nachname ist erforderlich")]
        public string Nachname { get; set; } = string.Empty;

        [Required(ErrorMessage = "Mailadresse ist erforderlich")]
        [EmailAddress(ErrorMessage = "Ungültige E-Mail-Adresse")]
        public string Mailadresse { get; set; } = string.Empty;

        [Required(ErrorMessage = "Tische ist erforderlich")]
        public int Tische { get; set; }

        [Required(ErrorMessage = "Kuchen ist erforderlich")]
        public bool Kuchen { get; set; }
    }

}
