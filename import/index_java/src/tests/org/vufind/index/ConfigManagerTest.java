package tests.org.vufind.index;

import org.junit.Test;
import static org.junit.Assert.assertEquals;

import org.vufind.index.ConfigManager;

/**
 * Exercise the {@code NliDataException} class from the command line.
 *
 * @author Conor Sheehan
 *
 */
public class ConfigManagerTest
{
    @Test
    public void findConfigFile()
    {
        String testMessage = "this is a test";
        Exception e = new Exception(testMessage);
        assertEquals(e.getMessage(), testMessage);
    }
}
