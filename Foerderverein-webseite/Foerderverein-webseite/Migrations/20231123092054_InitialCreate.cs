using Microsoft.EntityFrameworkCore.Migrations;

#nullable disable

namespace Foerderverein_webseite.Migrations
{
    public partial class InitialCreate : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.CreateTable(
                name: "Flohmarkt2024",
                columns: table => new
                {
                    Id = table.Column<int>(type: "integer", nullable: false)
                        .Annotation("SqlServer:Identity", "1, 1"),
                    Vorname = table.Column<string>(type: "text", nullable: true),
                    Nachname = table.Column<string>(type: "text", nullable: true),
                    Mailadresse = table.Column<string>(type: "text", nullable: true),
                    Tische = table.Column<int>(type: "integer", nullable: false),
                    Kuchen = table.Column<bool>(type: "bit", nullable: false)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_Flohmarkt2024", x => x.Id);
                });
        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropTable(
                name: "Flohmarkt2024");
        }
    }
}
