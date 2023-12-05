using System;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;
using Microsoft.Extensions.Logging;
using Foerderverein_webseite.Data;

namespace Foerderverein_webseite.Views.Home
{
    public class Kinderflohmarkt2024Model : PageModel
    {
        private readonly ApplicationDbContext _context;
        private readonly ILogger<Kinderflohmarkt2024Model> _logger;

        public Kinderflohmarkt2024Model(ApplicationDbContext context, ILogger<Kinderflohmarkt2024Model> logger)
        {
            _context = context;
            _logger = logger;
        }

        [BindProperty]
        public FlohmarktAnmeldedatenBase FlohmarktEntry { get; set; }

        public void OnGet()
        {
            // Setze die Eigenschaft auf eine neue Instanz, um NullReferenceExceptions zu vermeiden.
            FlohmarktEntry = new FlohmarktAnmeldedatenBase();
        }

        public async Task<IActionResult> OnPost()
        {
            Console.WriteLine("OnPost is called.");
            _logger.LogInformation($"FlohmarktAnmeldung is null: {FlohmarktEntry == null}");

            // Überprüfe die Validität des Models
            if (!ModelState.IsValid)
            {
                // Wenn das Model nicht gültig ist, zeige die Seite erneut an.
                return Page();
            }

            // Hier könntest du die Daten vor dem Speichern bearbeiten, falls notwendig.

            // Hinzufügen zum DbContext und Speichern in der Datenbank
            _context.FlohmarktAnmeldedatenBase.Add(FlohmarktEntry);
            await _context.SaveChangesAsync();

            // Hier könntest du eine Weiterleitung oder eine Bestätigung implementieren.
            TempData["ShowPopup"] = true;

            // Wenn die Daten erfolgreich gespeichert wurden, leite auf die Index-Seite weiter.
            return RedirectToPage("/Index");
        }
    }
}
