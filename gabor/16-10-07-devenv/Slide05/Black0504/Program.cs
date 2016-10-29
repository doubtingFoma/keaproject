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
            Box myBox = new Box();
            myBox.SetWidth(5);
            myBox.SetLength(6);
            myBox.SetHeight(7);
            Console.WriteLine($"The volume of the box is: {myBox.CalculateVolume()}");
        }
    }
}
