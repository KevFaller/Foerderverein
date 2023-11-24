using System.Collections.Generic;
using System.Threading.Tasks;
using Foerderverein_webseite.Data;
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

        public async Task OnGetAsync()
        {
            ArtikelList = await _context.Artikel.ToListAsync();
        }
    }
}
