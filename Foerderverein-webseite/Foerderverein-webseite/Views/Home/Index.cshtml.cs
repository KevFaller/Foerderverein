using System.Collections.Generic;
using System.Threading.Tasks;
using Foerderverein_webseite.Data;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;
using Microsoft.EntityFrameworkCore;

namespace Foerderverein_webseite.Views.Home
{
    public class IndexModel : PageModel
    {
        private readonly ApplicationDbContext _context;

        public IndexModel(ApplicationDbContext context)
        {
            _context = context;
        }

        public IList<Artikel> ArtikelList { get; set; }

        public async Task<IActionResult> OnGetAsync()
        {
            try
            {
                ArtikelList = await _context.Artikel.ToListAsync();
                return Page();
            }
            catch (Exception ex)
            {
                // Hier könntest du die Exception-Details protokollieren oder debuggen
                Console.WriteLine($"Fehler in OnGetAsync: {ex.Message}");
                return Page(); // oder return NotFound(); je nach Bedarf
            }
        }

    }
}
