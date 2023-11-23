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

        public Kinderflohmarkt2024Model(ApplicationDbContext context)
        {
            _context = context;
        }

        [BindProperty]
        public FlohmarktAnmeldedatenBase FlohmarktEntry { get; set; }

        public void OnGet()
        {
            FlohmarktEntry ??= new FlohmarktAnmeldedatenBase();
        }

        public async Task<IActionResult> OnPostAsync()
        {
            Console.WriteLine("OnPostAsync is called.");
            if (!ModelState.IsValid)
            {
                return Page();
            }

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