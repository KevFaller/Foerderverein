using System;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;
using Microsoft.EntityFrameworkCore;
using Foerderverein_webseite.Data;
using Foerderverein_webseite;

namespace Foerderverein_webseite.Views.Home
{
    public class Kinderflohmarkt2024Model : PageModel
    {
        private readonly ApplicationDbContext _context;
        private readonly ILogger<Kinderflohmarkt2024Model> _logger;

        public Kinderflohmarkt2024Model(ApplicationDbContext context, ILogger<Kinderflohmarkt2024Model> logger)
        {
            _context = context;
            _logger = logger; // Weisen Sie dem Logger die Instanz zu
        }

        [BindProperty]
        public FlohmarktAnmeldedatenBase FlohmarktEntry { get; set; }

        public void OnGet()
        {
            FlohmarktEntry = new FlohmarktAnmeldedatenBase();
        }

        public async Task<IActionResult> OnPost()
        {
            Console.WriteLine("OnPost is called.");
            _logger.LogInformation($"FlohmarktAnmeldung is null: {FlohmarktEntry == null}");


            // Hier könntest du die Daten vor dem Speichern bearbeiten, falls notwendig.

            // Hinzufügen zum DbContext und Speichern in der Datenbank
            _context.FlohmarktAnmeldedatenBase.Add(FlohmarktEntry);
            await _context.SaveChangesAsync();

            // Hier könntest du eine Weiterleitung oder eine Bestätigung implementieren.
            TempData["ShowPopup"] = true;

            return RedirectToPage("/Index"); // Hier anpassen, wohin du nach dem Speichern weitergeleitet werden möchtest.
        }
    }
}