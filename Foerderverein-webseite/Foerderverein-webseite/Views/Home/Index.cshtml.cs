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
        private readonly ILogger _logger;
        

        public IndexModel(ApplicationDbContext context, ILogger logger)
        {
            _context = context;
            _logger = logger;
        }

        public IList<Artikel> ArtikelList { get; set; } = new List<Artikel>();

        public async Task OnGetAsync()
        {
            try
            {
                ArtikelList = await _context.Artikel.ToListAsync();
            }
            catch (Exception ex)
            {
                _logger.LogError(ex.Message);   
            }
        }

    }
}
