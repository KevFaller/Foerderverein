using System.ComponentModel.DataAnnotations;

namespace Foerderverein_webseite
{
    public class Artikel
    {
        public int Id { get; set; }

        [Required(ErrorMessage = "Titel ist erforderlich")]
        public string Titel { get; set; }

        [Required(ErrorMessage = "Inhalt ist erforderlich")]
        public string Inhalt { get; set; }

        public string ImagePath { get; set; } = "Förderverein_logo.png"; // Standardwert

        // Weitere Eigenschaften...
    }
}
