using Microsoft.EntityFrameworkCore;
using Microsoft.Extensions.Configuration;

namespace Foerderverein_webseite.Data
{
    public class ApplicationDbContext : DbContext
    {
        private readonly IConfiguration _configuration;

        public ApplicationDbContext(DbContextOptions<ApplicationDbContext> options, IConfiguration configuration)
            : base(options)
        {
            _configuration = configuration;
        }

      

        public DbSet<FlohmarktAnmeldedatenBase> FlohmarktAnmeldedatenBase { get; set; }


        protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder)
        {
            if (!optionsBuilder.IsConfigured)
            {
                optionsBuilder.UseNpgsql(_configuration.GetConnectionString("DefaultConnection"),
                    o => o.MigrationsAssembly("Förderverein-webseite"));
            }
        }
    }
}
