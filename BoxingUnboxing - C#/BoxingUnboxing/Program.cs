using System;

namespace BoxingUnboxing
{
    class Program
    {
        static void Main(string[] args)
        {
            int beforeUnbox = 1;
            object boxObject = beforeUnbox;
            int afterUnbox = (int)boxObject;
        }
    }
}
