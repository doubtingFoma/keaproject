using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0504
{
    class Program
    {
        static void Main(string[] args)
        {
            decimal length = 5;
            decimal width = 6;
            decimal height = 7;
            Box myBox = new Box(length, width, height);

            Console.WriteLine($"The volume of the box is: {myBox.Volume}");
        }
    }
}
