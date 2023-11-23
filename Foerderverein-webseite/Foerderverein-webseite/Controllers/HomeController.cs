using System.Diagnostics;
using Microsoft.AspNetCore.Mvc;
using Foerderverein_webseite.Models;

namespace Foerderverein_webseite.Controllers;

public class HomeController : Controller
{
    private readonly ILogger<HomeController> _logger;

    public HomeController(ILogger<HomeController> logger)
    {
        _logger = logger;
    }

    public IActionResult Index()
    {
        return View();
    }

    public IActionResult Privacy()
    {
        return View();
    }
    public IActionResult UeberUns()
    {
        return View();
    }
    public IActionResult Veranstaltungen()
    {
        return View();
    }
    public IActionResult MitgliedWerden()
    {
        return View();
    }

    [ResponseCache(Duration = 0, Location = ResponseCacheLocation.None, NoStore = true)]
    public IActionResult Error()
    {
        return View(new ErrorViewModel { RequestId = Activity.Current?.Id ?? HttpContext.TraceIdentifier });
    }
}

